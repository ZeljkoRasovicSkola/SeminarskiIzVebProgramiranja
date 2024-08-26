<?php

require '../PHPMailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true);

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 $email=$_POST["email"];

 try
 {
  $errors=[];

  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'resendVerificationEmailModel.php';
  require_once 'resendVerificationEmailControler.php';

  if(emptyInput($email))
   $errors["emptyInput"]="Fill in a email field!";

  if(invalidEmail($email))
   $errors["invalidEmail"]="Choose a proper email!";

  if(!(existingEmail($pdo,$email)))
   $errors["emailTaken"]="Email is not registered!";

  if($errors)
  {
   $_SESSION["errorsAtResendVerificationEmail"]=$errors;

   header("Location: ../pages/resendVerificationEmail.php");
   die();
  }

  $result=userDataGet($pdo,$email);

  if($result)
  {
   if(!($result["status"]==="deleted"))
   {
    if($result["status"]==="activated")
    {
     $pdo=null;
     $stmt=null;

     header("Location: ../pages/resendVerificationEmail.php?resendVerificationEmail=alreadyVerified");
     die();
    }
    else
    {
     $firstName=$result["firstname"];
     $lastName=$result["lastname"];
     $token=$result["token"];

     $updatedResults=resendEmailVerification($email,$firstName,$lastName,$token,$mail);

     if($updatedResults)
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/resendVerificationEmail.php?resendVerificationEmail=success");
      die();
     }
     else
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/resendVerificationEmail.php?resendVerificationEmail=faileddas1");
      die();
     }
    }
   }
   else
   {
    $pdo=null;
    $stmt=null;

    header("Location: ../pages/resendVerificationEmail.php?resendVerificationEmail=emailIsDeleted");
    die();
   }
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/resendVerificationEmail.php?resendVerificationEmail=fdasdailed");
   die();
  }
 }
 catch(PDOException $e)
 {
  die("Query failed: ".$e->getMessage());
 }
}
else
{
 header("Location: ../pages/resendVerificationEmail.php");
 die();
}
?>

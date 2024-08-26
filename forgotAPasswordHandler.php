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
  require_once 'forgotAPasswordModel.php';
  require_once 'forgotAPasswordControler.php';

  if(emptyInput($email))
   $errors["emptyInput"]="Fill in a email field!";

  if(invalidEmail($email))
   $errors["invalidEmail"]="Choose a proper email!";

  if(!(existingEmail($pdo,$email)))
   $errors["emailTaken"]="Email is not registered!";

  if($errors)
  {
   $_SESSION["errorsAtForgotAPassword"]=$errors;

   header("Location: ../pages/forgotAPassword.php");
   die();
  }

  $result=userDataGet($pdo,$email);

  if($result)
  {
   $status=$result["status"];

   if(!($result["status"]==="deleted"))
   {
    if(!($result["status"]==="pending"))
    {
     if($result["status"]==="activated")
     {
      $firstName=$result["firstname"];
      $lastName=$result["lastname"];
      $token=$result["token"];

      $answer=passwordchangeEmailVerification($email,$firstName,$lastName,$token,$mail);

      if($answer)
      {
       header("Location: ../pages/login.php?forgotAPassword=emailIsSented");
       $pdo=null;
       $stmt=null;
       die();
      }
      else
      {
       header("Location: ../pages/forgotAPassword.php?forgotAPassword=failedToSendAMail");
       $pdo=null;
       $stmt=null;
       die();
      }
     }
     else
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/forgotAPassword.php?signup=notImplementedYet");
      die();
     }
    }
    else
    {
     $pdo=null;
     $stmt=null;

     header("Location: ../pages/forgotAPassword.php?signup=notVerified");
     die();
    }
   }
   else
   {
    $pdo=null;
    $stmt=null;

    header("Location: ../pages/forgotAPassword.php?signup=emailIsDeleted");
    die();
   }
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/forgotAPassword.php?forgotAPassword=failed");
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
 header("Location: ../pages/forgotAPassword.php");
 die();
}
?>

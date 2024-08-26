<?php
 
require '../PHPMailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true);

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 $email=trim($_POST["email"]);
 $firstName=trim($_POST["firstName"]);
 $lastName=trim($_POST["lastName"]);
 $phone=trim($_POST["phone"]);
 $pass=trim($_POST["pass"]);
 $passRepeat=trim($_POST["passRepeat"]);
 $token=md5(rand());

 try
 {
  $errors=[];

  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'signupModel.php';
  require_once 'signupControler.php';

  if(emptyInputSignup($email,$firstName,$lastName,$phone,$pass,$passRepeat))
   $errors["emptyInput"]="Fill in all fields!";

  if(invalidName($firstName))
   $errors["invalidFirstName"]="Choose a proper first name!";

  if(invalidName($lastName))
   $errors["invalidLastName"]="Choose a proper last name!";

  if(invalidPhone($phone))
   $errors["invalidPhone"]="Choose a proper phone number!";

  if(invalidEmail($email))
   $errors["invalidEmail"]="Choose a proper email!";

  if(existingEmail($pdo,$email))
   $errors["emailTaken"]="Email is already taken!";

  if(invalidPassword($pass))
   $errors["passMatch"]="Choose a proper password!";

  if(passMatch($pass,$passRepeat))
   $errors["passMatch"]="Passwords do not match!";

  if($errors)
  {
   $_SESSION["errorsAtSignup"]=$errors;
   
   $signupData=
   [
    "firstName"=>$firstName,
    "lastName"=>$lastName,
    "phone"=>$phone,
    "email"=>$email
   ];

   $_SESSION["signupData"]=$signupData;

   header("Location: ../pages/signup.php");
   die();
  }

  $answer=userCreate($pdo,$email,$firstName,$lastName,$phone,$pass,$token,$mail);

  if($answer)
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/signup.php?signup=pending");
   die();
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/signup.php?signup=failedToCreateANewUser");
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
 header("Location: ../pages/signup.php");
 die();
}

?>

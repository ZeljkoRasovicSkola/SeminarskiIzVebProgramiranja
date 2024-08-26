<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 $email=$_POST["email"];
 $pass=$_POST["pass"];
 $passRepeat=$_POST["passRepeat"];
 $token=$_POST["token"];

 try
 {
  $errors=[];

  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'passwordChangeModel.php';
  require_once 'passwordChangeControler.php';

  if(emptyInputs($email,$pass,$passRepeat,$token))
   $errors["emptyInput"]="Fill in all fields!";

  if(invalidEmail($email))
   $errors["invalidEmail"]="Choose a proper email!";

  if(!(existingEmail($pdo,$email)))
   $errors["emailTaken"]="That email does not exist!";

  if(invalidPassLength($pass))
   $errors["passMatch"]="Passwords is to short!";

  if(passMatch($pass,$passRepeat))
   $errors["passMatch"]="Passwords do not match!";

  if($errors)
  {
   $_SESSION["errorsAtPasswordChange"]=$errors;

   header("Location: ../pages/passwordChange.php?email=$email&token=$token");
   die();
  }

  $answer=tokenVerification($pdo,$email,$token);

  if($answer)
  {
   $result=passwordUpdate($pdo,$pass,$email,$token);

   if($result)
   {
    $newToken=md5(rand());
    $update=tokenUpdate($pdo,$email,$token,$newToken);
    if($update)
    {
     if(isset($_SESSION["id"]))
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/editProfile.php?passwordChange=passwordIsUpdated");
      die();
     }
     else
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/login.php?passwordChange=passwordIsUpdated");
      die();
     }
    }
    else
    {
     $pdo=null;
     $stmt=null;

     header("Location: ../pages/passwordChange.php?passwordChange=tokenIsNotUpdated");
     die();
    }
   }
   else
   {
    $pdo=null;
    $stmt=null;

    header("Location: ../pages/passwordChange.php?passwordChange=passwordIsNotUpdated&email=$email&token=$token");
    die();
   }
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/passwordChange.php?passwordChange=InvalidTokenOrEmail&email=$email&token=$token");
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
 header("Location: ../../pages/login.php");
 die();
}

?>

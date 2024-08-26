<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 $email=$_POST["email"];
 $pass=$_POST["pass"];

 try
 {
  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'loginModel.php';
  require_once 'loginControler.php';

  $errors=[];

  if(emptyInputLogin($email,$pass))
   $errors["emptyInput"]="Fill in all fields!";

  if(invalidEmail($email))
   $errors["invalidEmail"]="Choose a proper email!";

  $result=userDataGet($pdo,$email);

  if($result)
  {
   if(isPasswordWrong($pass,$result["password"]))
    $errors["incorrectLogin"]="Incorrect login info!";
  }
  else
  {
   $errors["incorrectLogin"]="Incorrect login info!";
  }

  if($errors)
  {
   $_SESSION["errorsAtLogin"]=$errors;
   header("Location: ../pages/login.php");
   die();
  }

  if($result["status"]==="pending")
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/login.php?login=notActivated");
   die();
  }
  else if($result["status"]==="deleted")
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/login.php?login=deleted");
   die();
  }

  $_SESSION["id"]=htmlspecialchars($result["peopleID"]);
  $_SESSION["firstname"]=htmlspecialchars($result["firstname"]);
  $_SESSION["lastname"]=htmlspecialchars($result["lastname"]);
  $_SESSION["phone"]=htmlspecialchars($result["phone"]);
  $_SESSION["email"]=htmlspecialchars($result["email"]);
  $_SESSION["token"]=htmlspecialchars($result["token"]);
  $_SESSION["role"]=htmlspecialchars($result["role"]);


  $answer=imageGet($pdo,$result["peopleID"]);
  $_SESSION["imgstatus"]=htmlspecialchars($answer["status"]);

  if($$answer["status"]==="empty")
  {
   $_SESSION["imgname"]="avatar.svg";
  }
  else
  {
   $_SESSION["imgname"]=$answer["name"];
  }

  if($_SESSION["role"]==="admin")
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/controlCenter.php");
   die();
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/index.php");
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
 header("Location: ../pages/login.php");
 die();
}
?>

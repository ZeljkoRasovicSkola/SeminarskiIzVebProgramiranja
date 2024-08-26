<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 require_once '../include/db.php';
 require_once '../include/session.php';
 require_once 'deleteProfileModel.php';
 require_once 'deleteProfileControler.php';
 
 $id=$_SESSION["id"];

 $result=profileImageDelete($pdo,$id);
 $answer=userDelete($pdo,$id);

 if($result && $answer)
 {
  $pdo=null;
  $stmt=null;

  require_once '../include/session.php';

  session_unset();
  session_destroy();

  $pdo=null;
  $stmt=null;

  header("Location: ../pages/index.php");
  exit();
 }
 else
 {
  $pdo=null;
  $stmt=null;

  header("Location: ../pages/profile.php?deleteProfile=failed");
  exit();
 }
}
else
{
 header("Location: ../pages/index.php");
 exit();
}

?>

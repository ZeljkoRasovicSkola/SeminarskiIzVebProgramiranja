<?php

require_once '../include/db.php';
require_once 'verifyEmailControler.php';
require_once 'verifyEmailModel.php';

if(isset($_GET["token"]))
{
 $token=$_GET["token"];
 $result=tokenVerification($pdo,$token);
 $id=$result["peopleID"];

 if($result)
 {
  if(!($result["status"]==="deleted"))
  {
   if(!($result["status"]==="activated"))
   {
    if($result["status"]==="pending")
    {
     $updatedResults=statusUpdate($pdo,$id);

     if($updatedResults)
     {
      $token=md5(rand());
      $updatedToken=tokenUpdate($pdo,$id,$token);

      if($updatedToken)
      {
       $pdo=null;
       $stmt=null;

       header("Location: ../pages/signup.php?signup=success");
       die();
      }
      else
      {
       $pdo=null;
       $stmt=null;

       header("Location: ../pages/signup.php?signup=failedToChangeToken");
       die();
      }
     }
     else
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/signup.php?signup=statusUpdateFailed");
      die();
     }
    }
    else
    {
     $pdo=null;
     $stmt=null;

     header("Location: ../pages/signup.php?signup=notImplementedYet");
     die();
    }
   }
   else
   {
    $pdo=null;
    $stmt=null;

    header("Location: ../pages/signup.php?signup=alreadyVerified");
    die();
   }
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/signup.php?signup=emailIsDeleted");
   die();
  }
 }
 else
 {
  $pdo=null;
  $stmt=null;

  header("Location: ../pages/signup.php?signup=failed");
  die();
 }
}
else
{
 header("Location: ../pages/signup.php");
 die();
}

?>

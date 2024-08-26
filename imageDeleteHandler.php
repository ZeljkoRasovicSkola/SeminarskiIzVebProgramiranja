<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 try
 {
  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'imageDeleteModel.php';
  require_once 'imageDeleteControler.php';

  $fileName='../../upload/'.$_SESSION["imgname"];

  if(file_exists($fileName))
  {
   if($_SESSION["imgname"]="avatar.svg")
   {
    header("Location: ../pages/profile.php");
    die();
   }

   if(!unlink($file))
   {
    header("Location: ../pages/profile.php?image=fileIsNotDeleted");
    die();
   }
   else
   {
    $result=profileImageDelete($pdo,$_SESSION["id"]);

    if($result)
    {
     $pdo=null;
     $stmt=null;

     $_SESSION["imgname"]="avatar.svg";
     header("Location: ../pages/profile.php?image=fileIsDeleted");
     die();
    }
    else
    {
     $pdo=null;
     $stmt=null;

     header("Location: ../pages/profile.php?image=fileIsDeletedButProfileImageTableIsNotUpdated");
     die();
    }
   }
  }
  else
  {
   header("Location: ../pages/profile.php?image=fileWithThatNameDoesNotExist");
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
 header("Location: ../pages/profile.php");
 die();
}

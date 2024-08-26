<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 $fileName=$_FILES["image"]["name"];
 $fileTempName=$_FILES["image"]["tmp_name"];
 $fileSize=$_FILES["image"]["size"];
 $fileError=$_FILES["image"]["error"];
 $fileType=$_FILES["image"]["type"];

 $fileExtTemp=pathinfo($fileName, PATHINFO_EXTENSION);
 $fileExt=strtolower($fileExtTemp);

 try
 {
  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'imageUploadModel.php';
  require_once 'imageUploadControler.php';

  if($fileError)
  {
   header("Location: ../pages/profile.php?image=fileError");
   die();
  }
  else
  {
   if(is_uploaded_file($fileTempName))
   {
    if(!exif_imagetype($fileTempName))
    {
     header("Location: ../pages/profile.php?image=fileIsNotAImage");
     die();
    }
    else
    {
     if($fileSize<4194304)
     {
      $newFileName="profile".$_SESSION["id"].".".$fileExt;
      $destination="../../upload/".$newFileName;

      $move=move_uploaded_file($fileTempName,$destination);

      if($move)
      {
       $result=profileImageUpdate($pdo,$newFileName,$_SESSION["id"]);

       if($result)
       {
        $_SESSION["imgname"]=$newFileName;

        $pdo=null;
        $stmt=null;

        header("Location: ../pages/profile.php?image=uploadSuccess");
        die();
       }
       else
       {
        $pdo=null;
        $stmt=null;

        header("Location: ../pages/profile.php?image=profileImageStatusIsNotUpdated");
        die();
       }
      }
      else
      {
       $pdo=null;
       $stmt=null;

       header("Location: ../pages/profile.php?image=moveFailed");
       die();
      }
     }
     else
     {
      $pdo=null;
      $stmt=null;

      header("Location: ../pages/profile.php?image=fileIsTooBig");
      die();
     }
    }
   }
   else
   {
    $pdo=null;
    $stmt=null;

    header("Location: ../pages/profile.php?image=fileIsNotUploaded");
    die();
   }
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

?>

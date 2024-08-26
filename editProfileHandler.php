<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 $firstName=$_POST["firstName"];
 $lastName=$_POST["lastName"];
 $phone=$_POST["phone"];

 try
 {
  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'editProfileModel.php';
  require_once 'editProfileControler.php';

  $errors=[];

  if(emptyInputEditProfile($firstName,$lastName,$phone))
   $errors["emptyInput"]="Fill in all fields!";

  if(invalidName($firstName))
   $errors["invalidFirstName"]="Choose a proper first name!";

  if(invalidName($lastName))
   $errors["invalidLastName"]="Choose a proper last name!";

  if(invalidPhone($phone))
   $errors["invalidPhone"]="Choose a proper phone number!";

  if($errors)
  {
   $_SESSION["errorsAtEdit"]=$errors;

   $editData=
   [
    "firstName"=>$firstName,
    "lastName"=>$lastName,
    "phone"=>$phone,
    "email"=>$email
   ];

   $_SESSION["editData"]=$editData;

   header("Location: ../pages/editProfile.php");
   die();
  }

  $result=userChange($pdo,$_SESSION["id"],$firstName,$lastName,$phone);

  if($result)
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/editProfile.php?edit=success");
   die();
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/editProfile.php?edit=failedToChangeUser");
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

?>

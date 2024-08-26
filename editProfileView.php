<?php

function checkEditErrors()
{
 if(isset($_SESSION["errorsAtEdit"]))
 {
  $errors=$_SESSION['errorsAtEdit'];

  foreach($errors as $error)
  {
   echo'<div class="flex">';
   echo' <div class="bg red">'.$error.'</div>';
   echo'</div>';
  }

  unset($_SESSION['errorsAtEdit']);
 }
 else if(isset($_GET["edit"]) && $_GET["edit"]==="success")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">You have uccessfully updated the profile!</div>';
  echo'</div>';
 }
 else if(isset($_GET["edit"]) && $_GET["edit"]==="failedToChangeUser")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We have failed to edit your profile!</div>';
  echo'</div>';
 }
 else if(isset($_GET["passwordChange"]) && $_GET["passwordChange"]==="passwordIsUpdated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">You have uccessfully updated the password of your profile!</div>';
  echo'</div>';
 }
}

function editInputs()
{
 if(isset($_SESSION["editData"]["firstName"]) && !isset($_SESSION["errorsAtEdit"]["invalidFirstName"]) && !(isset($_GET["edit"]) && $_GET["edit"]==="success"))
 {
  echo'<label for="firstName">First name:</label>';
  echo'<br>';
  echo'<input type="text" id="firstName" name="firstName" placeholder="First name" class="input" required value="'.$_SESSION["editData"]["firstName"].'">';

 }
 else
 {
  echo'<label for="firstName">First name:</label>';
  echo'<br>';
  echo'<input type="text" id="firstName" name="firstName" class="input" required placeholder="First name" value="'.$_SESSION["firstname"].'">';

 }
 
 echo'<br>';
 echo'<br>';
 
 if(isset($_SESSION["editData"]["lastName"]) && !isset($_SESSION["errorsAtEdit"]["invalidLastName"]) && !(isset($_GET["edit"]) && $_GET["edit"]==="success"))
 {
  echo'<label for="lastName">Last name:</label>';
  echo'<br>';
  echo'<input type="text" id="lastName" name="lastName" class="input" placeholder="Last name" required value="'.$_SESSION["editData"]["lastName"].'">';
 }
 else
 {
  echo'<label for="lastName">Last name:</label>';
  echo'<br>';
  echo'<input type="text" id="lastName" name="lastName" class="input" required placeholder="Last name" value="'.$_SESSION["lastname"].'">';
 }
 
  echo'<br>';
  echo'<br>';
  
 if(isset($_SESSION["editData"]["phone"]) && !isset($_SESSION["errorsAtEdit"]["invalidPhone"]) && !(isset($_GET["edit"]) && $_GET["edit"]==="success"))
 {
  echo'<label for="phone">Phone:</label>';
  echo'<br>';
  echo'<input type="phone" id="phone" name="phone" class="input" required placeholder="Phone" value="'.$_SESSION["editData"]["phone"].'">';
 }
 else
 {
  echo'<label for="phone">Phone:</label>';
  echo'<br>';
  echo'<input type="phone" id="phone" name="phone" class="input" required placeholder="Phone" value="'.$_SESSION["phone"].'">';
 }
}

?>

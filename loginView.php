<?php

function checkLoginErrors()
{
 if(isset($_SESSION["errorsAtLogin"]))
 {
  $errors=$_SESSION["errorsAtLogin"];

  foreach($errors as $error)
  {
   echo'<div class="flex">';
   echo' <div class="bg red">'.$error.'</div>';
   echo'</div>';
   echo'<br>';
  }

  unset($_SESSION['errorsAtLogin']);
 }
 else if(isset($_GET["login"]) && $_GET["login"]==="notActivated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your profile is not activated!</div>';
  echo'</div>';
 }
 else if(isset($_GET["login"]) && $_GET["login"]==="deleted")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your profile is deleted!</div>';
  echo'</div>';
 }
 else if(isset($_GET["passwordChange"]) && $_GET["passwordChange"]==="passwordIsUpdated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your password is successfully updated!</div>';
  echo'</div>';
 }
 else if(isset($_GET["forgotAPassword"]) && $_GET["forgotAPassword"]==="emailIsSented")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We send you a password reset link!</div>';
  echo'</div>';
 }
}

?>

<?php

function checkForgotAPasswordErrors()
{
 if(isset($_SESSION["errorsAtForgotAPassword"]))
 {
  $errors=$_SESSION['errorsAtForgotAPassword'];

  foreach($errors as $error)
  {
   echo'<div class="flex">';
   echo' <div class="bg red">'.$error.'</div>';
   echo'</div>';
   echo'<br>';
  }

  unset($_SESSION['errorsAtForgotAPassword']);
 }
 else if(isset($_GET["forgotAPassword"]) && $_GET["forgotAPassword"]==="failed")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Sending of your verification email failed!</div>';
  echo'</div>';
 }
 else if(isset($_GET["forgotAPassword"]) && $_GET["forgotAPassword"]==="notVerified")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">This profile is not yet activated!</div>';
  echo'</div>';
 }
 else if(isset($_GET["forgotAPassword"]) && $_GET["forgotAPassword"]==="emailIsDeleted")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">This profile is deleted!</div>';
  echo'</div>';
 }
 else if(isset($_GET["forgotAPassword"]) && $_GET["forgotAPassword"]==="failedToSendAMail")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We failed to send you a password reset email!</div>';
  echo'</div>';
 }
}

?>

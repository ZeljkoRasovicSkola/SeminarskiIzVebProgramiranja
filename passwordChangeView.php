<?php

function checkPasswordChangeErrors()
{
 if(isset($_SESSION["errorsAtPasswordChange"]))
 {
  $errors=$_SESSION["errorsAtPasswordChange"];

  foreach($errors as $error)
  {
   echo'<div class="flex">';
   echo' <div class="bg red">'.$error.'</div>';
   echo'</div>';
   echo'<br>';
  }

  unset($_SESSION['errorsAtLPasswordChange']);
 }
 else if(isset($_GET["passwordChange"]) && $_GET["passwordChange"]==="InvalidTokenOrEmail")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your submited email or token is wrong!</div>';
  echo'</div>';
 }
 else if(isset($_GET["passwordChange"]) && $_GET["passwordChange"]==="passwordIsNotUpdated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your password is not updated!</div>';
  echo'</div>';
 }
 else if(isset($_GET["passwordChange"]) && $_GET["passwordChange"]==="tokenIsNotUpdated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your token is not updated!</div>';
  echo'</div>';
 }
}

?>

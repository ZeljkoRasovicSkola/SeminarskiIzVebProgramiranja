<?php

function checkSignupErrors()
{
 if(isset($_SESSION["errorsAtSignup"]))
 {
  $errors=$_SESSION['errorsAtSignup'];

  foreach($errors as $error)
  {
   echo'<div class="flex">';
   echo' <div class="bg red">'.$error.'</div>';
   echo'</div>';
   echo'<br>';
  }

  unset($_SESSION['errorsAtSignup']);
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="failedToSendAEmail")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We failed to send you a email!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="pending")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Please check your emails, because we send you a activation link!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="failedToCreateANewUser")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your signup failed!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="emailIsDeleted")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your profile is deleted!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="alreadyVerified")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your profile is already activated!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="statusUpdateFailed")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We failed to change a status!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="failed")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your profile activation failed!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="failedToChangeToken")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We failed to change a token!</div>';
  echo'</div>';
 }
 else if(isset($_GET["signup"]) && $_GET["signup"]==="success")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Your profile activated, you can now log in!</div>';
  echo'</div>';
 }
}

function signupInputs()
{
 if(isset($_SESSION["signupData"]["firstName"]) && !isset($_SESSION["errorsAtSignup"]["invalidFirstName"]) && !(isset($_GET["signup"]) && $_GET["signup"]==="success"))
 {
  echo'<label for="firstName">First name:</label>';
  echo'<br>';
  echo'<input type="text" id="firstName" name="firstName" placeholder="First name" class="input" required value="'.$_SESSION["signupData"]["firstName"].'">';
 }
 else
 {
  echo'<label for="firstName">First name:</label>';
  echo'<br>';
  echo'<input type="text" id="firstName" name="firstName" class="input" required placeholder="First name">';
 }
 echo'<br>';
 echo'<br>';

 if(isset($_SESSION["signupData"]["lastName"]) && !isset($_SESSION["errorsAtSignup"]["invalidLastName"]) && !(isset($_GET["signup"]) && $_GET["signup"]==="success"))
 {
  echo'<label for="lastName">Last name:</label>';
  echo'<br>';
  echo'<input type="text" id="lastName" name="lastName" placeholder="Last name" class="input" required value="'.$_SESSION["signupData"]["lastName"].'">';
 }
 else
 {
  echo'<label for="lastName">Last name:</label>';
  echo'<br>';
  echo'<input type="text" id="lastName" name="lastName" class="input" required placeholder="Last name">';
 }
  echo'<br>';
  echo'<br>';
  
 if(isset($_SESSION["signupData"]["phone"]) && !isset($_SESSION["errorsAtSignup"]["invalidPhone"]) && !(isset($_GET["signup"]) && $_GET["signup"]==="success"))
 {
  echo'<label for="phone">Phone:</label>';
  echo'<br>';
  echo'<input type="phone" id="phone" name="phone" class="input" required placeholder="Phone" value="'.$_SESSION["signupData"]["phone"].'">';
 }
 else
 {
  echo'<label for="phone">Phone:</label>';
  echo'<br>';
  echo'<input type="phone" id="phone" name="phone" class="input" required placeholder="Phone">';
 }
  echo'<br>';
  echo'<br>';
 
 if(isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errorsAtSignup"]["invalidEmail"]) && isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errorsAtSignup"]["emailExists"]) && !(isset($_GET["signup"]) && $_GET["signup"]==="success"))
 {
  echo'<label for="email">Email:</label>';
  echo'<br>';
  echo'<input type="email" id="email" name="email" class="input" required placeholder="Email" value="'.$_SESSION["signupData"]["email"].'">';
 }
 else
 {
  echo'<label for="email">Email:</label>';
  echo'<br>';
  echo'<input type="email" id="email" name="email" class="input" required placeholder="Email">';
 }
  echo'<br>';
  echo'<br>';
}

?>

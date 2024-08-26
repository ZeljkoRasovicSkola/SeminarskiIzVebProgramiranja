<?php

function emptyInput($email)
{
 $result=true;

 if(empty(trim($email)))
  $result=true;
 else
  $result=false;

 return $result;
}

function invalidEmail($email)
{
 $result=true;
 
 if(!(filter_var($email,FILTER_VALIDATE_EMAIL)))
  $result=true;
 else
  $result=false;

 return $result;
}

function existingEmail($pdo,$email)
{
 $result=true;
 
 if(emailExists($pdo,$email))
  $result=true;
 else
  $result=false;

 return $result;
}

function userDataGet($pdo,$email)
{
 $result=emailExists($pdo,$email);
 return $result;
}

function resendEmailVerification($email,$firstName,$lastName,$token,$mail)
{
 $result=false;
 $subject="Resend a email verification";
 $url="http://127.0.0.1/restaurant/php/signup/verifyEmail.php?token=";
 $HTMLContent=
  "
   <h2>Hi ".$firstName." ".$lastName.", you asked for resend of verification email.</h2>
   <p>Please, verify your email address with the link given below.</p>
   <br>
   <a href=".$url.$token.">Activation link</a>
  ";
 $content="Hi ".$firstName." ".$lastName.", you asked for resend of verification email.\nPlease, verify your email address with the link given below.\n\nActivation link: ".$url.$token;
 //Password='lmdi rirs rrti mvsu'
 try
 {
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->SMTPAuth=true;
  $mail->SMTPSecure="tls";
  $mail->Port=587;
  $mail->Username='zeljkorasovicskola@gmail.com';
  $mail->Password='lmdi rirs rrti mvsu';
  $mail->Priority=1;
  $mail->CharSet='UTF-8';
  $mail->Subject=$subject;
  $mail->setFrom('zeljkorasovicskola@gmail.com',$firstName." ".$lastName);
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Body=$HTMLContent;
  $mail->AltBody=$content;
  $mail->send();
  $result=true;
  return $result;
 }
 catch(Exception $e)
 {
   $result=false;
   header("Location: ../pages/resendVerificationEmail.php?resendVerificationEmail=failedSend");
   $pdo=null;
   $stmt=null;
   die();
 }
}

?>

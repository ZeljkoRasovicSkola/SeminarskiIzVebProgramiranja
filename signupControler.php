<?php

function emptyInputSignup($email,$firstName,$lastName,$phone,$pass,$passRepeat)
{
 $result=true;
 
 if(empty($email) || empty($firstName) || empty($lastName) || empty($phone) || empty($pass) || empty($passRepeat))
  $result=true;
 else
  $result=false;
 
 return $result;
}

function invalidName($name)
{
 $result=true;
 
 if(!(preg_match("/^[a-zA-Z0-9]{3,30}$/",$name)))
  $result=true;
 else
  $result=false;
 
 return $result;
}

function invalidPhone($phone)
{
 $result=true;
 
 if(!(preg_match("/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/",$phone)))
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

function invalidPassword($pass)
{
 $result=true;
 
 if(!(preg_match('/^[a-zA-Z0-9]{8,60}$/',$pass)))
  $result=true;
 else
  $result=false;
 
 return $result;
}

function passMatch($pass,$passRepeat)
{
 $result=true;

 if($pass!==$passRepeat)
  $result=true;
 else
  $result=false;
 
 return $result;
}

function sendVerificationEmail($email,$firstName,$lastName,$token,$mail)
{
 $result=false;
 $subject="Email verification";
 $url="http://127.0.0.1/restaurant/php/signup/verifyEmail.php?token=";
 $HTMLContent=
  "
   <h2>Hi ".$firstName." ".$lastName.", you have sign up.</h2>
   <p>Please, verify your email address with the link given below.</p>
   <br>
   <a href=".$url.$token.">Activation link</a>
  ";
 $content="Hi ".$firstName." ".$lastName.", you have sign up.\nPlease, verify your email address with the link given below.\n\nActivation link: ".$url.$token;
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
  header("Location: ../pages/signup.php?signup=failedToSendAEmail");
  $pdo=null;
  $stmt=null;
  die();
 }
}

function userCreate($pdo,$email,$firstName,$lastName,$phone,$pass,$token,$mail)
{
 $result=createUser($pdo,$email,$firstName,$lastName,$phone,$pass,$token);
 $temp=peopleIDFinder($pdo,$email);
 $answer=createDefaultProfileImage($pdo,$temp["peopleID"]);

 if($result && $answer)
 {
  $send=sendVerificationEmail($email,$firstName,$lastName,$token,$mail);

  if($send)
   $result=true;
  else
   $result=false;
 }
 
 return $result;
}

?>

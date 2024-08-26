<?php

function emptyInputLogin($email,$pass)
{
 $result=true;
 
 if(empty(trim($email)) || empty(trim($pass)))
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

function userDataGet($pdo,$email)
{
 $result=getUserData($pdo,$email);
 
 return $result;
}

function isPasswordWrong($pass,$hashedPass)
{
 $result=true;

 if(!password_verify($pass,$hashedPass))
  $result=true;
 else
  $result=false;

 return $result;
}

function imageGet($pdo,$id)
{
 $result=getImage($pdo,$id);
 
 return $result;
}

?>

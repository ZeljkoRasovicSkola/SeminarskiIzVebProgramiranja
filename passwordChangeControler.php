<?php

function emptyInputs($pass,$passRepeat,$email,$token)
{
 $result=true;
 
 if(empty(trim($pass)) && empty(trim($passRepeat)) && empty(trim($email)) && empty(trim($token)))
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

function invalidPassLength($pass)
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

function tokenVerification($pdo,$email,$token)
{
 $result=verifyToken($pdo,$email,$token);
 return $result;
}

function passwordUpdate($pdo,$pass,$email,$token)
{
 $result=updateAPassword($pdo,$pass,$email,$token);
 return $result;
}

function tokenUpdate($pdo,$email,$token,$newToken)
{
 $result=updateAToken($pdo,$email,$token,$newToken);
 return $result;
}

?>

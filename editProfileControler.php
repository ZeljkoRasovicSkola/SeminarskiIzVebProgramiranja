<?php

function emptyInputEditProfile($firstName,$lastName,$phone)
{
 $result=true;
 
 if(empty(trim($firstName)) || empty(trim($lastName)) || empty(trim($phone)))
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

function userChange($pdo,$id,$firstName,$lastName,$phone)
{
 $result=changeUser($pdo,$id,$firstName,$lastName,$phone);
 
 if($result)
 {
  $_SESSION["firstname"]=$firstName;
  $_SESSION["lastname"]=$lastName;
  $_SESSION["phone"]=$phone;
  $result=true;
 }
 else
 {
  $result=false;
 }

 return $result;
}

?>

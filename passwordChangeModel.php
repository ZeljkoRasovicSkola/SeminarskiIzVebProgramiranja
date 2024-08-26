<?php

function emailExists($pdo,$email)
{
 $sql="SELECT * FROM people WHERE email=:email LIMIT 1;";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":email",$email);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;
}

function verifyToken($pdo,$email,$token)
{
 $sql='SELECT * FROM people WHERE email=:email AND token=:token LIMIT 1;';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":email",$email);
 $stmt->bindParam(":token",$token);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;
}

function updateAPassword($pdo,$pass,$email,$token)
{
 $sql='UPDATE people SET password=:pass WHERE email=:email AND token=:token LIMIT 1;';

 $options=['cost'=>12];
 $hashedPass=password_hash($pass,PASSWORD_BCRYPT,$options);

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":pass",$hashedPass);
 $stmt->bindParam(":email",$email);
 $stmt->bindParam(":token",$token);

 if($stmt->execute())
  $result=true;
 else
  $result=false;

 return $result;
}

function updateAToken($pdo,$email,$token,$newToken)
{
 $sql='UPDATE people SET token=:newToken WHERE email=:email AND token=:token LIMIT 1;';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":newToken",$newToken);
 $stmt->bindParam(":email",$email);
 $stmt->bindParam(":token",$token);

 if($stmt->execute())
  $result=true;
 else
  $result=false;

 return $result;
}

?>

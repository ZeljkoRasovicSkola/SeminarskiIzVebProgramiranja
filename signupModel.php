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

function createUser($pdo,$email,$firstName,$lastName,$phone,$pass,$token)
{
 $sql="INSERT INTO people(email,firstname,lastname,phone,password,token) VALUES (:email,:firstname,:lastname,:phone,:pass,:token)";

 $options=['cost'=>12];
 $hashedPass=password_hash($pass,PASSWORD_BCRYPT,$options);

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":email",$email);
 $stmt->bindParam(":firstname",$firstName);
 $stmt->bindParam(":lastname",$lastName);
 $stmt->bindParam(":phone",$phone);
 $stmt->bindParam(":pass",$hashedPass);
 $stmt->bindParam(":token",$token);

 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

function peopleIDFinder($pdo,$email)
{
 $sql="SELECT * FROM people WHERE email=:email LIMIT 1;";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":email",$email);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;
}

function createDefaultProfileImage($pdo,$id)
{
 $sql="INSERT INTO profileImage(peopleID) VALUES (:id)";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$id);

 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}


?>

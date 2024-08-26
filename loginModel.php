<?php

function getUserData($pdo,$email)
{
 $sql='SELECT * FROM people WHERE email=:email LIMIT 1;';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":email",$email);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;
}

function getImage($pdo,$id)
{
 $sql='SELECT * FROM profileImage WHERE peopleID=:id LIMIT 1;';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$id);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;
}

?>

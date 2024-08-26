<?php

function deleteProfileImage($pdo,$id)
{
 $sql='DELETE FROM profileImage WHERE peopleID=:id;';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$id);
 
 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

function deleteUser($pdo,$id)
{
 /*$sql='DELETE FROM people WHERE peopleID=:id;';*/
 $sql='UPDATE people SET status="deleted" WHERE peopleID=:id;';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$id);
 
 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

?>

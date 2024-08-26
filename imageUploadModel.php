<?php

function updateProfileImage($pdo,$name,$id)
{
 $sql='UPDATE profileImage SET status="uploaded", name=:name WHERE peopleID=:id;';
 
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":name",$name);
 $stmt->bindParam(":id",$id);

 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

?>

<?php

function deleteProfileImage($pdo,$id)
{
 $sql='UPDATE profileImage SET status="empty", name="avatar.svg" WHERE peopleID=:id;';
 
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$id);

 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

?>

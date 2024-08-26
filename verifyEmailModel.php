<?php

function verifyToken($pdo,$token)
{
 $sql="SELECT * FROM people WHERE token=:token LIMIT 1;";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":token",$token);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;
}

function updateStatus($pdo,$id)
{
 $sql="UPDATE people SET status='activated' WHERE peopleID=:id;";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$id);

 if($stmt->execute())
  $result=true;
 else
  $result=false;

 return $result;
}

function updateToken($pdo,$id,$token)
{
 $sql="UPDATE people SET token=:token WHERE peopleID=:id;";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":token",$token);
 $stmt->bindParam(":id",$id);

 if($stmt->execute())
  $result=true;
 else
  $result=false;

 return $result;
}

?>

<?php

function changeUser($pdo,$id,$firstName,$lastName,$phone)
{
 $sql="UPDATE people SET firstname=:firstname, lastname=:lastname, phone=:phone WHERE peopleID=:id;";
 
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":firstname",$firstName);
 $stmt->bindParam(":lastname",$lastName);
 $stmt->bindParam(":phone",$phone);
 $stmt->bindParam(":id",$id);

 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

?>

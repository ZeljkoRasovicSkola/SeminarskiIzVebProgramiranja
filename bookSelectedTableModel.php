<?php

function tableReservation($pdo,$code,$peopleID,$spotID,$date,$start,$end)
{
 $sql="INSERT INTO reservation(code,peopleID,spotID,dateOfIt,timeStart,timeEnd) VALUES (:code,:peopleID,:spotID,:date,:start,:end)";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":code",$code);
 $stmt->bindParam(":peopleID",$peopleID);
 $stmt->bindParam(":spotID",$spotID);
 $stmt->bindParam(":date",$date);
 $stmt->bindParam(":start",$start);
 $stmt->bindParam(":end",$end);

 if($stmt->execute())
  $result=true;
 else
  $result=false;
 
 return $result;
}

function spotReserve($pdo,$spotID)
{
 $sql="UPDATE spot SET reserved='yes' WHERE spotID=:id;";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":id",$spotID);

 if($stmt->execute())
  $result=true;
 else
  $result=false;

 return $result;
}
?>

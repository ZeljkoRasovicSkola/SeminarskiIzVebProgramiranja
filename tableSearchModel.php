<?php

function findTable($pdo,$numberOfPeople,$smoke)
{
 $sql='SELECT * FROM spot WHERE seat>=:number AND smoke=:smoke AND reserved="no";';

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(":number",$numberOfPeople);
 $stmt->bindParam(":smoke",$smoke);
 $stmt->execute();

 $result=$stmt->fetch(PDO::FETCH_ASSOC);
 return $result;

}

?>

<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
 try
 {
  require_once '../include/db.php';
  require_once 'tableSearchModel.php';
  require_once 'tableSearchControler.php';

  $data=file_get_contents("php://input");
  $search=json_decode($data, true);

  $numberOfPeople=$search["numberOfPeople"];
  $smoke=$search["smoke"];

  $result=tableFind($pdo,$numberOfPeople,$smoke);

  echo json_encode($result, JSON_PRETTY_PRINT);

 }
 catch(PDOException $e)
 {
  die("Query failed: ".$e->getMessage());
 }
}
else
{
 header("Location: ../pages/bookATable.php");
 die();
}

?>

<?php

$dbUsername="root";
$dbPassword="";

try
{
 $pdo=new PDO("mysql:host=localhost;dbname=restaurant",$dbUsername,$dbPassword);
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 die("Connection failed: ".$e->getMessage());
}

?>

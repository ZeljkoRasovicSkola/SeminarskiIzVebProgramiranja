<?php
 
require '../PHPMailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true);

if($_SERVER["REQUEST_METHOD"]==="POST")
{
  $spotID=$_POST['id'];
  $date=$_POST['date'];
  $start=$_POST['start'];
  $end=$_POST['end'];
  $code=rand(100,999)."-".rand(100,999);

 try
 {
  require_once '../include/db.php';
  require_once '../include/session.php';
  require_once 'bookSelectedTableModel.php';
  require_once 'bookSelectedTableControler.php';

  $peopleID=$_SESSION['id'];
  $email=$_SESSION['email'];
  $firstname=$_SESSION['firstname'];
  $lastname=$_SESSION['lastname'];

  $result=reserveATable($mail,$email,$firstname,$lastname,$code,$pdo,$peopleID,$spotID,$date,$start,$end);

  if($result)
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/bookedTables.php");
   die();
  }
  else
  {
   $pdo=null;
   $stmt=null;

   header("Location: ../pages/profile.php");
   die();
  }
 }
 catch(PDOException $e)
 {
  die("Query failed: ".$e->getMessage());
 }
}
else
{
 header("Location: ../pages/profile.php");
 die();
}

?>


?>

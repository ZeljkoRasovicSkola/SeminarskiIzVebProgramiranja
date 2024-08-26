<?php

function sendCodeEmail($spotID,$email,$firstName,$lastName,$code,$mail)
{
 $result=false;
 $subject="You reserve table number ".$spotID;
 $HTMLContent=
  "
   <h2>Hi ".$firstName." ".$lastName.", reserve table number ".$spotID.".</h2>
   <p>Here is your reservation code ".$code."</p>
   <br>
  ";
 $content="Hi ".$firstName." ".$lastName.", you reserve table number ".$spotID.".\nHere is your reservation code ".$code."\n";
 //Password='lmdi rirs rrti mvsu'
 try
 {
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->SMTPAuth=true;
  $mail->SMTPSecure="tls";
  $mail->Port=587;
  $mail->Username='zeljkorasovicskola@gmail.com';
  $mail->Password='lmdi rirs rrti mvsu';
  $mail->Priority=1;
  $mail->CharSet='UTF-8';
  $mail->Subject=$subject;
  $mail->setFrom('zeljkorasovicskola@gmail.com',$firstName." ".$lastName);
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Body=$HTMLContent;
  $mail->AltBody=$content;
  $mail->send();
  $result=true;
  return $result;
 }
 catch(Exception $e)
 {
  $result=false;
  header("Location: ../pages/profile.php");
  $pdo=null;
  $stmt=null;
  die();
 }
}

function reserveATableInSpotTable($pdo,$spotID)
{
 $answer=spotReserve($pdo,$spotID);
 return $answer;
}

function reserveATable($mail,$email,$firstname,$lastname,$code,$pdo,$peopleID,$spotID,$date,$start,$end)
{
 $result=tableReservation($pdo,$code,$peopleID,$spotID,$date,$start,$end);
 $answer=reserveATableInSpotTable($pdo,$spotID);

 if($result && $answer)
 {
  $send=sendCodeEmail($spotID,$email,$firstName,$lastName,$code,$mail);

  if($send)
   $result=true;
   
  else
   $result=false;
 }
 return $result;
}

?>

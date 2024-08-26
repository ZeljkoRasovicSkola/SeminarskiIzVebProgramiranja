<?php
 $title="Admin area";
 include_once '../include/head.php';
 include_once '../include/session.php';
?>
 <body>
  <?php
   if($_SESSION["role"]!=="admin")
    header("Location: ../pages/index.php");
  ?>
  <main>
   <section>
   <?php
    echo'<div class="flex top">';
    echo' <h1 id="welcome" class="bg">Welcome '.$_SESSION["role"].' to control center</h1>';
    echo'</div>';
   ?>
   </section>
   <section>
    <div class="flex">
     <div class="bg">
     <table>
       <tr>
        <th>Code</th>
        <th>Date Of It</th>
        <th>time Start</th>
        <th>Time End</th>
        <th>Table number</th>
        <th>Number of seats</th>
        <th>Smoke Area</th>
        <th>Email</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Phone</th>
       </tr>
       <?php
       require_once '../include/db.php';
       require_once '../include/session.php';

       $sql="SELECT * FROM reservation JOIN spot JOIN people ON reservation.spotID=spot.spotID && reservation.peopleID=people.peopleID";

       $stmt=$pdo->prepare($sql);
       $stmt->execute();

       $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

       foreach ($result as $row)
       {
        echo'
        <tr>
         <td>'.$row['code'].'</td>
         <td>'.$row['dateOfIt'].'</td>
         <td>'.$row['timeStart'].'</td>
         <td>'.$row['timeEnd'].'</td>
         <td>'.$row['spotID'].'</td>
         <td>'.$row['seat'].'</td>
         <td>'.$row['smoke'].'</td>
         <td>'.$row['email'].'</td>
         <td>'.$row['firstname'].'</td>
         <td>'.$row['lastname'].'</td>
         <td>'.$row['phone'].'</td>
        </tr>';
       }
    ?>
      </table>
     </div>
    </div>
   </section>
   <section>
    <br>
    <br>
    <div class="flex">
     <form method="POST" action="../editProfile/logout.php">
      <input type="submit" name="logout" class="button" value="Logout">
     </form>
    </div>
    <br>
   </section>
  </main>
 </body>
</html>

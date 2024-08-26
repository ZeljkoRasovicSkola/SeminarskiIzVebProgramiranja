<?php
 $title="Booked tables";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include_once '../include/nav.php';
  ?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <div class="flex">
       <h2>Booked tables</h2>
      </div>
     </div>
    </div>
   </section>
   <?php
    require_once '../include/db.php';
    require_once '../include/session.php';

    $id=$_SESSION['id'];

    $sql="SELECT * FROM reservation JOIN spot ON reservation.spotID=spot.spotID WHERE peopleID=:id;";

    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row)
    {
    ?>
   <section>
    <div class="flex">
     <div class="bg top">
    <?php
     echo'<p class="marginLeft marginRight greyBg">Table number: '.$row["spotID"].'</p>';
     echo'<p class="marginLeft marginRight greyBg">Date: '.$row["dateOfIt"].'</p>';
     echo'<p class="marginLeft marginRight greyBg">Start: '.$row["timeStart"].'</p>';
     echo'<p class="marginLeft marginRight greyBg">End: '.$row["timeEnd"].'</p>';
     echo'<p class="marginLeft marginRight greyBg">Code: '.$row["code"].'</p>';
     echo'<p class="marginLeft marginRight greyBg">Number of seats: '.$row["seat"].'</p>';
     echo'<p class="marginLeft marginRight greyBg">Smoke area: '.$row["smoke"].'</p>';
    ?>
     </div>
    </div>
   </section>
    <?php
    }
    ?>
  </main>
 </body>
</html>

<?php
 $title="Home page";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include '../include/nav.php';
  ?>
  <main>
   <section>
     <?php
      if(isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]))
      {
       echo'<div class="flex top">';
       echo' <h1 id="welcome" class="bg">Welcome '.$_SESSION["firstname"]." ".$_SESSION["lastname"].'</h1>';
       echo'</div>';
      }
      else
      {
       echo'<div class="flex top">';
       echo' <h1 id="welcome" class="bg">Welcome to Restaurant</h1>';
       echo'</div>';
      }
     ?>
   </section>
  </main>
 </body>
</html>

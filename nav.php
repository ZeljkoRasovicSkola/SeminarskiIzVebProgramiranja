<?php
 require_once 'session.php';
?>
  <header>
   <nav class="bg flex">
    <a href="index.php" id="logo" class="navElements"><img src="../../img/restaurant.svg" alt="Restaurant" width="32px"></a>
    <a href="index.php" id="logoText" class="navElements noFit">Restaurant</a>
    <?php
     if(isset($_SESSION["id"]))
     {
      echo'<div class="flex">';
      echo' <a href="bookATable.php" class="navElements noFitMedium">Book a table</a>';
      echo' <a href="bookedTables.php" class="navElements noFitMedium">Booked tables</a>';
      echo' <a href="profile.php" class="navElements noFitMedium">Profile</a>';
      echo'</div>';
     }
     else
     {
      echo'<div class="flex">';
      echo' <a href="login.php" class="navElements noFitMedium">Log in</a>';
      echo' <a href="signup.php" class="navElements noFitMedium">Sign up</a>';
      echo'</div>';
     }
    ?>
   </nav>
   <label class="menu navElements">
    <input type="checkbox">
   </label>
   <aside class="dropdown">
    <?php
     if(isset($_SESSION["id"]))
     {
      echo'<div class="flex">';
      echo' <a href="bookATable.php" class="dropdownElement dropdownBorder">Book a table</a>';
      echo'</div>';
      echo'<div class="flex">';
      echo' <a href="bookedTables.php" class="dropdownElement dropdownBorder">Booked tables</a>';
      echo'</div>';
      echo'<div class="flex">';
      echo' <a href="profile.php" class="dropdownElement dropdownBorder">Profile</a>';
      echo'</div>';
     }
     else
     {
      echo'<div class="flex">';
      echo' <a href="login.php" class="dropdownElement dropdownBorder">Log in</a>';
      echo'</div>';
      echo'<div class="flex">';
      echo' <a href="signup.php" class="dropdownElement dropdownBorder">Sign up</a>';
      echo'</div>';
     }
     ?>
    </aside>
  </header>

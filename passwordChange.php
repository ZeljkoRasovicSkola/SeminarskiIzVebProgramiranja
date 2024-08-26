<?php
 $title="Change a password";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include '../include/nav.php';
   require_once '../login/passwordChangeView.php';

   $token="";
   $email="";

   if(isset($_GET["token"]) && isset($_GET["email"]))
   {
    $token=$_GET["token"];
    $email=$_GET["email"];
   }
  ?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <div class="flex">
       <h2>Change a password</h2>
      </div>
      <div class="flex">
       <form method="POST" action="../login/passwordChangeHandler.php">
        <input type="hidden" name="email" required value=<?php echo $email; ?>>
        <label for="pass">Password:</label>
        <br>
        <input type="password" name="pass" id="pass" minlength="8" class="input" required placeholder="Password">
        <br>
        <br>
        <label for="passRepeat">Repeat password:</label>
        <br>
        <input type="password" name="passRepeat" id="passRepeat" class="input" minlength="8" required placeholder="Repeat password">
        <input type="hidden" name="token" required value=<?php echo $token; ?>>
        <br>
        <br>
        <div class="flex">
         <input type="submit" class="button" name="submit" value="Send">
        </div>
        <?php
         if(isset($_SESSION["id"]))
         {        
          echo'<br>';
          echo'<br>';
          echo'<div class="flex">';
          echo' <a href="editProfile.php" class="link">Edit profile</a>';
          echo'</div>';
         }
         ?>
        <br>
       </form>
      </div>
     </div>
    </div>
   </section>
   <section>
    <br>
    <?php
     checkPasswordChangeErrors();
    ?>
   </section>
  </main>
 </body>
</html>

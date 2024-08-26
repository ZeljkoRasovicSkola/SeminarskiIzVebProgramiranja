<?php
 $title="Profile page";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include_once '../include/nav.php';
   require_once '../editProfile/profileView.php';
   if(!isset($_SESSION["id"]))
   {
    $_SESSION["imgname"]="avatar.svg";
    $_SESSION["firstname"]="";
    $_SESSION["lastname"]="";
    $_SESSION["phone"]="";
    $_SESSION["email"]="";
   }
  ?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <div class="flex">
       <h2>Profile</h2>
      </div>
      <div class="flex greyBg image">       
       <label for="image">
        <?php
          echo'<img src="../../upload/'.$_SESSION["imgname"].'?'.mt_rand().' alt="avatar" width="128px">';
        ?>
       </label>
      </div>
       <form method="POST" action="../editProfile/imageUploadHandler.php" enctype="multipart/form-data">
        <input type="file" name="image" id="image" class="invisible" onchange="this.form.submit()">
       </form>
      <form method="POST" action="../editProfile/imageDeleteHandler.php">
       <div class="flex">
        <input type="submit" name="submit" class="button" value="Delete a profile image">
       </div>
      </form>
      <br>
      <br>
       <?php
       if(isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]))
       {
        echo'<p class="marginLeft marginRight greyBg">Firstname: '.$_SESSION["firstname"].'</p>';
        echo'<p class="marginLeft marginRight greyBg">Lastname: '.$_SESSION["lastname"].'</p>';
        echo'<p class="marginLeft marginRight greyBg">Phone: '.$_SESSION["phone"].'</p>';
        echo'<p class="marginLeft marginRight greyBg">Email: '.$_SESSION["email"].'</p>';
       }
       ?>
      <br>
      <div class="flex">
       <a href="editProfile.php" class="navLinks link">Edit profile</a>
      </div>
      <br>
      <br>
      <div class="flex">
       <form method="POST" action="../editProfile/logout.php">
        <input type="submit" name="logout" class="button" value="Logout">
       </form>
      </div>
      <br>
     </div>
    </div>
   </section>
   <section>
    <br>
    <?php
     profileMessages();
    ?>
   </section>
  </main>
 </body>
</html>

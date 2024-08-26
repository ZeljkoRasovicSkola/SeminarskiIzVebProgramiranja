<?php
 $title="Edit profile";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include_once '../include/nav.php';
   require_once '../editProfile/editProfileView.php';
   if(isset($_SESSION["id"]))
   {
    $link="passwordChange.php?token=".$_SESSION["token"]."&email=".$_SESSION["email"];
   }
   else
   {
    $link="editProfile.php";
    $_SESSION["firstname"]="";
    $_SESSION["lastname"]="";
    $_SESSION["phone"]="";
    $_SESSION["token"]="";
    $_SESSION["email"]="";
   }
  ?>
  <main>
   <section>
    <div class="flex">
     <div class="bg">
      <div class="flex">
       <h2>Edit profile</h2>
      </div>
      <form method="POST" action="../editProfile/editProfileHandler.php">
       <?php
	    editInputs();
	   ?>
       <br>
       <br>
       <div class="flex">
        <input type="submit" name="submit" class="button" value="Change">
       </div>
      </form>
      <br>
      <br>
      <div class="flex">
       <a href="profile.php" class="navElements link">Profile</a>
      </div>
      <br>
      <br>
      <div class="flex">
       <div class="navElements link">
        <div class="flex smallMargin">
         <a href="<?php echo $link ?>">Change</a>
        </div>
        <div class="flex smallMargin">
         <a href="<?php echo $link ?>">password</a>
        </div>
       </div>
      </div>
      <br>
      <br>
      <div class="flex">
       <form method="POST" action="../editProfile/deleteProfile.php">
        <input type="submit" name="delete" class="button" value="Delete profile">
       </form>
      </div>
      <br>
     </div>
    </div>
   </section>
   <section>
    <br>
    <?php
     checkEditErrors();
    ?>
   </section>
  </main>
 </body>
</html>

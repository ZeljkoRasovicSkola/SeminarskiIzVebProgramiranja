<?php
 $title="Log in page";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include '../include/nav.php';
   require_once '../login/loginView.php';
  ?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <div class="flex">
       <h2>Log in</h2>
      </div>
      <div class="flex">
       <form method="POST" action="../login/loginHandler.php">
	    <label for="email">Email:</label>
	    <br>
        <input type="email" id="email" name="email" class="input" required placeholder="Email">
        <br>
        <br>
	    <label for="pass">Password:</label>
	    <br>
        <input type="password" id="pass" name="pass" class="input" required placeholder="Password">
        <br>
	    <a href="forgotAPassword.php" class="small">Forgot a password</a>
	    <br>
        <br>
        <div class="flex">
         <input type="submit" class="button" name="submit" value="Log In">
        </div>
       </form>
      </div>
      <br>
      <br>
      <div class="flex">
       <a href="signup.php" class="navElements link">Sign up</a>
      </div>
      <br>
     </div>
    </div>
   </section>
   <section>
    <br>
    <?php
     checkLoginErrors();
    ?>
   </section>
  </main>
 </body>
</html>

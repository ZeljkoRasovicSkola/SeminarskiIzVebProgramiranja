<?php
 $title="Sign up page";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include '../include/nav.php';
   require_once '../signup/signupView.php';
  ?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <div class="flex">
       <h2>Sign up</h2>
      </div>
      <div class="flex">
       <form method="POST" action="../signup/signupHandler.php">
        <?php
         signupInputs();
        ?>
        <label for="pass">Password:</label>
        <br>
        <input type="password" id="pass" name="pass" minlength="8" class="input" required placeholder="Password">
        <br>
        <br>
        <label for="passRepeat">Repeat password:</label>
        <br>
        <input type="password" id="passRepeat" name="passRepeat" minlength="8" class="input" required placeholder="Repeat password">
        <br>
        <br>
        <div class="flex">
         <input type="submit" class="button" name="submit" value="Sign Up">
        </div>
       </form>
      </div>
      <br>
      <br>
      <div class="flex">
       <div class="navElements link small">
        <div class="flex smallMargin">
         <a href="resendVerificationEmail.php">Resend</a>
        </div>
        <div class="flex smallMargin">
         <a href="resendVerificationEmail.php">verification</a>
        </div>
        <div class="flex smallMargin">
         <a href="resendVerificationEmail.php">mail</a>
        </div>
       </div>
      </div>
      <br>
      <br>
      <div class="flex">
       <a href="login.php" class="link">Log in</a>
      </div>
      <br>
     </div>
    </div>
   </section>
   <section>
    <br>
    <?php
     checkSignupErrors();
    ?>
   </section>
  </main>
 </body>
</html>

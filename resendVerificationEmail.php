<?php
 $title="Resend verification email";
 include_once '../include/head.php';
?>
 <body>
<?php
 include '../include/nav.php';
 require_once '../signup/resendVerificationEmailView.php';
?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <br>
      <div class="flex noMargins">
       <h2 class="smallMargins">Resend</h2>
      </div>
      <div class="flex">
       <h2 class="smallMargins">verification</h2>
      </div>
      <div class="flex">
       <h2 class="smallMargins">email</h2>
      </div>
      <br>
      <div class="flex">
       <form method="POST" action="../signup/resendVerificationEmailHandler.php">
	    <label for="email">Email:</label>
	    <br>
        <input type="email" name="email" class="input" id="email" required placeholder="Email">
        <br>
        <br>
        <div class="flex">
         <input type="submit" class="button" name="submit" value="Resend">
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
     checkResendVerificationEmailErrors();
    ?>
   </section>
  </main>
 </body>
</html>

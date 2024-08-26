<?php
 $title="Forgot a password";
 include_once '../include/head.php';
?>
 <body>
<?php
 include '../include/nav.php';
 require_once '../login/forgotAPasswordView.php';
?>
  <main>
   <section>
    <div class="flex">
     <div class="bg top">
      <br>
      <div class="flex noMargins">
       <h2 class="smallMargins">Send a change</h2>
      </div>
      <div class="flex">
       <h2 class="smallMargins">password email</h2>
      </div>
      <br>
      <div class="flex">
       <form method="POST" action="../login/forgotAPasswordHandler.php">
	    <label for="email">Email:</label>
	    <br>
        <input type="email" name="email" class="input" id="email" required placeholder="Email">
        <br>
        <br>
        <div class="flex">
         <input type="submit" class="button" name="submit" value="Send">
        </div>
       </form>
      </div>
      <br>
      <br>
      <div class="flex">
       <a href="login.php" class="navElements link">Log in</a>
      </div>
      <br>
     </div>
    </div>
   </section>
   <section>
    <br>
    <?php
     checkForgotAPasswordErrors();
    ?>
   </section>
  </main>
 </body>
</html>

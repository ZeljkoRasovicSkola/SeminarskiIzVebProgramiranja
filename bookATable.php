<?php
 $title="Book a table";
 include_once '../include/head.php';
?>
 <body>
  <?php
   include_once '../include/nav.php';
   include_once '../include/globals.php';
  ?>
  <main>
   <section>
    <div class="bookFlex">
     <div class="flex">
      <div class="bg top">
       <div class="flex">
        <h2>Book a table</h2>
       </div>
       <div class="flex">
        <form method="POST" action="" name="bookATable" id="bookATable">
         <label for="date">Date:</label>
         <br>
         <input type="date" id="date" name="date" class="input" min=<?php echo date('Y-m-d');?> required> 
         <br>
         <br>
         <label for="start">Time:</label>
         <br>
         <input type="time" id="start" name="start" class="input" required>
         <br>
         <br>
         <label for="duration">Duration:</label>
         <br>
         <select id="duration" name="duration" class="input" required>
          <?php
           for($i=1;$i<=$maxNumberOfHours;$i++)
           {
            if($i==1)
             echo'<option value="'.$i.'">'.$i.' hour</option>';
            else
             echo'<option value="'.$i.'">'.$i.' hours</option>';
           }
          ?>
         </select>
         <br>
         <br>
         <label for="numberOfPeople">Number of people:</label>
         <br>
         <select id="numberOfPeople" name="numberOfPeople" class="input" required>
          <?php
           for($i=1;$i<=$maxNumberOfPersons;$i++)
           {
            if($i==1)
             echo'<option value="'.$i.'">'.$i.' person</option>';
            else
             echo'<option value="'.$i.'">'.$i.' persons</option>';
           }
          ?>
         </select>
         <br>
         <br>
         <label>In smoking area:</label>
         <br>
         <input type="radio" id="smoke1" name="smoke" value="yes">
         <label for="smoke1">Yes</label>
         <input type="radio" id="smoke2" name="smoke" value="no" checked>
         <label for="smoke2">No</label>
         <br>
         <br>
         <div class="flex">
          <input type="submit" class="button" name="submit" value="Book a table">
         </div>
         <br>
        </form>
       </div>
      </div>
     </div>
     <div class="flex">
      <div class="bg top">
       <div class="flex">
        <h3>Working hours</h3>
       </div>
       <div class="flex">
        <p class="smallMargins">Monday - Friday</p>
       </div>
       <div class="flex">
        <?php
         echo'<p class="greyBg smallMargins">'.$startOfWorkingHoursMF.':00 - '.$endOfWorkingHoursMF.':00</p>';
        ?>
        <input type="hidden" id="startOfWorkingHoursMF" name="startOfWorkingHoursMF" class="input" value="<?php echo $startOfWorkingHoursMF ?>" required>
        <input type="hidden" id="endOfWorkingHoursMF" name="endOfWorkingHoursMF" class="input" value="<?php echo $endOfWorkingHoursMF ?>" required>
       </div>
       <br>
       <div class="flex">
        <p class="smallMargins">Saturday</p>
       </div>
       <div class="flex">
        <?php
         echo'<p class="greyBg smallMargins">'.$startOfWorkingHoursS.':00 - '.$endOfWorkingHoursS.':00</p>';
        ?>
        <input type="hidden" id="startOfWorkingHoursS" name="startOfWorkingHoursS" class="input" value="<?php echo $startOfWorkingHoursS ?>" required>
        <input type="hidden" id="endOfWorkingHoursS" name="endOfWorkingHoursS" class="input" value="<?php echo $endOfWorkingHoursS ?>" required>
       </div>
       <br>
       <div class="flex">
        <p class="smallMargins">Sunday</p>
       </div>
       <div class="flex">
        <p class="greyBg smallMargins">Closed</p>
       </div>
       <br>
      </div>
     </div>
    </div>
   </section>
   <section>
    <br>
    <div id="response">
    </div>
    <script src="../../js/bookATable.js"></script>
   </section>
  </main>
 </body>
</html>

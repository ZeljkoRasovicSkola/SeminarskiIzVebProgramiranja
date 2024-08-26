<!DOCTYPE html>
<?php
 $class="restaurantBackground";

 if($title==="Booked tables" || $title==="Book a table")
  $class="tablesBackground";

 if($title==="Admin area")
  $class="adminBackground";
?>
<html lang="en" class="<?php echo $class ?>">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow,noimageindex,nosnippet,noarchive,notranslate">
  <meta name="author" content="Zeljko Rasovic">
  <meta name="description" content="Restaurant project">
  <meta name="keywords" content="restaurant">
  <title><?php echo $title; ?> </title>
  <link rel="icon" type="image/x-icon" href="../../img/restaurant.svg">
  <link type="text/css" rel="stylesheet" media="screen" href="../../css/style.css">
 </head>

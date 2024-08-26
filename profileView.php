<?php

function profileMessages()
{
 if(isset($_GET["deleteProfile"]) && $_GET["deleteProfile"]==="failed")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We failed to delete your profile!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileError")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Image upload error!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileIsNotUploaded")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Image is not uploaded!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="moveFailed")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Moving image from temp location to upload location failed!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileIsNotAImage")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Uploaded file is not a image!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileIsTooBig")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Uploaded file is too big!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="profileImageStatusIsNotUpdated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We didn\'t update the status!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="uploadSuccess")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Image is uploaded successfully!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileIsNotDeleted")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">We failed to delete your image!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileIsDeleted")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Image is deleted!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileWithThatNameDoesNotExist")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Image with that name doesn\'t exist!</div>';
  echo'</div>';
 }
 else if(isset($_GET["image"]) && $_GET["image"]==="fileIsDeletedButProfileImageTableIsNotUpdated")
 {
  echo'<div class="flex">';
  echo' <div class="bg white">Image is deleted, but profile image table is not updated!</div>';
  echo'</div>';
 }
}

?>

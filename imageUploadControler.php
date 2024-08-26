<?php

function profileImageUpdate($pdo,$name,$id)
{
 $result=updateProfileImage($pdo,$name,$id);
 return $result;
}

?>

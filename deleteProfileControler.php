<?php

function profileImageDelete($pdo,$id)
{
 $result=deleteProfileImage($pdo,$id);
 return $result;
}

function userDelete($pdo,$id)
{
 $result=deleteUser($pdo,$id);
 return $result;
}

?>

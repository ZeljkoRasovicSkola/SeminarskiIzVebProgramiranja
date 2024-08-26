<?php

function profileImageDelete($pdo,$id)
{
 $result=deleteProfileImage($pdo,$id);
 return $result;
}

?>

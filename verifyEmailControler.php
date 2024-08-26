<?php

function tokenVerification($pdo,$token)
{
 $result=verifyToken($pdo,$token);
 return $result;
}

function statusUpdate($pdo,$id)
{
 $result=updateStatus($pdo,$id);
 return $result;
}

function tokenUpdate($pdo,$id,$token)
{
 $result=updateToken($pdo,$id,$token);
 return $result;
}

?>

<?php
include_once("inc/facebook.php"); 
$appId = '558516817683186'; 
$appSecret = 'd578b2abdcdefbc53a08cf7dcc2422fd'; 
$homeurl = 'http://dawit.x10host.com/patient.php';  
$fbPermissions = 'email';  


$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>
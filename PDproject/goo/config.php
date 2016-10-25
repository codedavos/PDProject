<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
$clientId = '126667355648-lu2e70e4oodfj31bjuvgb54jlsrlfta3.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '_hE4LZ2rU7yUP-MniRap1Qwn'; //Google CLIENT SECRET
$redirectUrl = 'http://dawit.x10host.com/physician.php';  //return url (url to script)
$homeUrl = 'http://dawit.x10host.com/';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to codexworld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
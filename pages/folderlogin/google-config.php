<?php
  require 'google-login/vendor/autoload.php';

  $client=new Google_Client();
  $client->setClientid('40981501409-bloe19393h167tl7q81e556p34u470i2.apps.googleusercontent.com');
  $client->setClientSecret('jm1cJH1cbF9vKuoKNqPAxZU-');
  $client->setRedirectUri('http://stoicescu.eu/pages/folderlogin/login-google.php');
  $client->addScope('email');
  $client->addScope('profile');

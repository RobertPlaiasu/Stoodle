<?php
session_start();

function deconect(){
  session_unset();
  session_destroy();
  setcookie("select", "",-60*60*24*30,"/");
  setcookie("validator","",-60*60*24*30,"/");
  header("Location: ../../index.php?logout=succes");
  exit();
}

if(isset($_SESSION['mailUser']))
  deconect();
  
if (isset($_SESSION['mailGmail'])) {
  require_once 'google-config.php';
  unset($_SESSION['acces_token']);
  $client->revokeToken();
  deconect();
}

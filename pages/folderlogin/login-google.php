<?php
  require 'google-config.php';
  require 'datacon.php';

  if(isset($_GET['code'])){
    $token=$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['acces_token']=$token;
    $auth=new Google_Service_Oauth2($client);
    $google_info=$auth->userinfo->get();
    $mail=$google_info->email;
    $name=$google_info->name;
    $_SESSION['mailGmail']=$mail;
    $_SESSION['nameGmail']=$name;
    $mysql="SELECT mailGmail FROM users_gmail WHERE mailGmail='$mail';";
      $result=mysqli_query($connection,$mysql);
      if(mysqli_num_rows($result)>0){
        header('Location:  ../../index.php?login=succes');
        exit();
      }
      else {
        $mysql="INSERT INTO users_gmail(nameGmail,mailGmail) VALUES('$name','$mail');";
      if(mysqli_query($connection,$mysql)){
        header('Location:  ../../index.php?login=succes');
        exit();
      }
        else {
          header('Location:  ../../index.php?error=mysqlerror');
          exit();
        }
      }
    }
  else {
    header('Location:  ../login.php?error=gmailconection');
    exit();
  }

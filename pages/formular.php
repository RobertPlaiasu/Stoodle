<?php
  session_start();
  require './folderlogin/datacon.php';
  
  if (!isset($_POST['formularsubmit'])){
    header("Location: ./formularTemplate.php");
    exit();
  }

  // check if information is valid

  // get data from json file
  $jsonFile = file_get_contents("ajax/formular.json");
  $jsonFile = json_decode($jsonFile, true);
  
  if( $_POST['sport'] != 0 && $_POST['sport'] != 1 ||
      $_POST['stress'] != 0 && $_POST['stress'] != 1 ||
      $_POST['social'] != 0 && $_POST['social'] != 1 ||
      $_POST['job'] != 0 && $_POST['job'] != 1 ||
      !in_array($_POST['county'], $jsonFile['county']) ||
      !in_array($_POST['class-1'], $jsonFile['classes']) ||
      !in_array($_POST['class-2'], $jsonFile['classes']) ||
      !in_array($_POST['class-3'], $jsonFile['classes']) ||
      !in_array($_POST['books'], $jsonFile['books']) ||
      !in_array($_POST['branch'], $jsonFile['branch']) ||
      !in_array($_POST['passion'], $jsonFile['passion']) ||
      $_POST["passionIntensity"] > 6 || $_POST["passionIntensity"] < 0){
    header("Location: ./formularTemplate.php?error=materii");
    exit();
  }

  if (isset($_SESSION['mailUser']))
  {
    $session=$_SESSION['mailUser'];
    $mysql="UPDATE users SET Profil=?,Domeniu=?,domeniu_intensitate=?,job=?,materie1=?,materie2=?,materie3=?,carti=?,sociabil=?,sport=?,stres=?,Judet=? WHERE mailUser=?";
  }
  elseif(isset($_SESSION['mailGmail']))
  {
    $session=$_SESSION['mailGmail'];
    $mysql="UPDATE users_gmail SET Profil=?,Domeniu=?,domeniu_intensitate=?,job=?,materie1=?,materie2=?,materie3=?,carti=?,sociabil=?,sport=?,stres=?,Judet=? WHERE mailGmail=?";
  }

  $stmt=mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt,$mysql)){
    header("Location: ./formularTemplate.php?database-error");
    exit();
  }
  
  mysqli_stmt_bind_param($stmt,"sssssssssssss", $_POST["branch"], $_POST["passion"], $_POST["passionIntensity"],
                        $_POST["job"], $_POST["class-1"], $_POST["class-2"], $_POST["class-3"], $_POST["books"],
                        $_POST["social"], $_POST["sport"], $_POST["stress"], $_POST["county"],$session);
  mysqli_stmt_execute($stmt);

  header("Location: ./homePage.php");
  exit();
<?php
  session_start();
  require './folderlogin/datacon.php';
  
  if (!isset($_POST['formularsubmit'])){
    header("Location: ./formularTemplate.php");
    exit();
  }

  $profil=$_POST['profile'];
  $pasiune=$_POST['passion'];
  $intensitate_pasiune=$_POST['passionIntensity'];
  $job=$_POST['job'];
  $carti=$_POST['books'];
  $judet=$_POST['judet'];
  $sport=$_POST['sport'];
  $stres=$_POST['stress'];
  $social=$_POST['social'];
  $materie1=$_POST['class-1'];
  $materie2=$_POST['class-2'];
  $materie3=$_POST['class-3'];

  if(empty($pasiune) || empty($intensitate_pasiune) || empty($carti) || empty($judet) ||  empty($materie1) || empty($materie2) || empty($materie3)){
    header("Location: ./formularTemplate.php");
    exit();
  }
  if ($intensitate_pasiune>6 || $intensitate_pasiune<0) {
    header("Location: ./formularTemplate.php");
    exit();
  }

  if (($materie1 == $materie2 || $materie1 == $materie3) || ($materie2 == $materie3 && $materie2!="Niciuna din cele de mai jos")) {
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
    header("Location: ./formularTemplate.php?l");
    exit();
  }
  
  mysqli_stmt_bind_param($stmt,"sssssssssssss",$profil,$pasiune,$intensitate_pasiune,$job,$materie1,$materie2,$materie3,$carti,$social,$sport,$stres,$judet,$session);
  mysqli_stmt_execute($stmt);

  header("Location: ./homePage.php");
  exit();
<?php
session_start();
require 'datacon.php';

if (!isset($_POST['loginsubmit'])){
  header("Location: ../login.php");
  exit();
}

$mailuserid = $_POST['mailus'];
$password = $_POST['passw'];

function fieldEmpty($var,$mailuserid,$msg){
  if (empty($var)) {
    header("Location: ../login.php?error=empty".$msg."&mailuserid=".$mailuserid);
    exit();
  }
}

function filterEmail($mailuserid){
  if (!filter_var($mailuserid,FILTER_VALIDATE_EMAIL))
  {
    header("Location: ../login.php?error=invalidmailuserid");
    exit();
  }
}

function filterPassword($var){
  if (!preg_match("/^[a-zA-Z0-9]*$/", $password))
  {
    header("Location: ../login.php?error=invalidpassw&mailuserid=" . $mailuserid);
    exit();
  }
}

/*check empty*/
fieldEmpty($mailuserid,$mailuserid,"mail");
fieldEmpty($password,$mailuserid,"pass");

/*validate email*/
filterEmail($mailuserid);

/*validate password*/
filterPassword($password);


$mysql = "SELECT * FROM users WHERE mailUser=?;";
$stmt = mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt, $mysql))
{
    header("Location: ../login.php?error=sqlierror");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $mailuserid);
mysqli_stmt_execute($stmt);
$check = mysqli_stmt_get_result($stmt);

if (!$valori = mysqli_fetch_assoc($check)){
  header("Location: ../login.php?error=nuUser");
  exit();
}

$password_verify = password_verify($password, $valori['pwdUsers']);
if (!$password_verify)
{
    header("Location: ../login.php?error=parolagresita&mailuserid=" . $mailuserid);
    exit();
}

$_SESSION['mail'] = $valori['mail'];
$_SESSION['type'] = $valori['type'];


  $mysql="DELETE FROM auth WHERE userid=".$valori['idUser'];
  mysqli_query($connection,$mysql);

  $date=time()+ 60*60*24*30;
  $selector=bin2hex(random_bytes(24));
  $token=bin2hex(random_bytes(64));
  $hash=password_hash($token,PASSWORD_DEFAULT);

  $id=$valori['idUser'];
  $mysql="INSERT INTO auth(validator,selector,userid,data) VALUES ('".$hash."','".$selector."','".$id."','".$date."')";
  mysqli_query($connection,$mysql);

  setcookie("select", $selector,$date,"/");
  setcookie("validator",$token,$date,"/");


header("Location: ../home.php");
exit();


<?php

if(!isset($_POST['submit-parola-reset'])){
  header("Location: ../login.php");
}

$select=$_POST['select'];
$token=$_POST['token'];
$parola=$_POST['resetparola'];
$confparola=$_POST['resetconfirmareparola'];

function asemanariParola($nume,$prenume,$password,$password_repeat,$select,$token){
  if (strpos(strtolower($nume),strtolower($password))!==false || 
      strpos(strtolower($password),strtolower($nume))!==false) {
    header("Location: ../newparola.php?error=identicpasswnume&select=".$select."&valid=".$token);
    exit();
  }
  if (strpos(strtolower($prenume),strtolower($password))!==false ||
      strpos(strtolower($password),strtolower($prenume))!==false) {
    header("Location: ../newparola.php?error=identicpasswprenume&select=".$select."&valid=".$token);
    exit();
  }
}

/*empty fields*/
function emptyVar($var,$msg,$select,$token){
  if(empty($var)){
    header("Location: ../newparola.php?error=emptyfield".$msg."&select=".$select."&valid=".$token);
    exit();
  }
}

function validateVarParola($var,$msg,$select,$token){
  if(!preg_match("/^[a-zA-Z0-9]*$/", $var)) {
    $msg="Location: ../newparola.php?error=invalid".$msg."&select=".$select."&valid=".$token;
    header($msg);
    exit();
  }
  if (strlen($var)<8) {
    $msg="Location: ../newparola.php?error=mic".$msg."&select=".$select."&valid=".$token;
    header($msg);
    exit();
  }
  if(strlen($var)>48) {
    $msg="Location: ../newparola.php?error=mare".$msg."&select=".$select."&valid=".$token;
    header($msg);
    exit();
  }
}


emptyVar($parola,"passw",$select,$token);
emptyVar($confparola,"passwrepeat",$select,$token);

validateVarParola($parola,"passw",$select,$token);
validateVarParola($confparola,"passwrepeat",$select,$token);

if ($parola !== $confparola) {
  header("Location: ../newparola.php?error=difparola&select=".$select."&valid=".$token);
  exit();
}

$date=date("U");

require_once '../folderlogin/datacon.php';
$mysql="SELECT * FROM resetare WHERE expireReset>=? AND selectReset =?";
$stmt=mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt,$mysql)) {
  header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
  exit();
}

mysqli_stmt_bind_param($stmt,"ss",$date,$select);
mysqli_stmt_execute($stmt);
$rezultat=mysqli_stmt_get_result($stmt);

if(!$rand=mysqli_fetch_assoc($rezultat)){
  $mysql="DELETE FROM resetare WHERE selectReset=?;";
  $stmt=mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($stmt,$mysql)) {
    header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
    exit();
  }

  mysqli_stmt_bind_param($stmt,"s",$select);
  mysqli_stmt_execute($stmt);
  header("Location: ../reset.php?error=expire");
  exit();
}

$ok=password_verify($token,$rand['tokenReset']);

if(!$ok){
  header("Location: ../newparola.php?error=anothertoken&select=".$select."&valid=".$token);
  exit();
}

$mysql="SELECT * FROM users WHERE mailUser=?;";
$stmt=mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt,$mysql)) {
  header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
  exit();
}

mysqli_stmt_bind_param($stmt,"s",$rand['mailReset']);
mysqli_stmt_execute($stmt);
$rezultat=mysqli_stmt_get_result($stmt);

if(!$var=mysqli_fetch_assoc($rezultat)){
  header("Location: ../reset.php?error=nouser");
  exit();
}

asemanariParola($var['Nume'],$var['Prenume'],$parola,$confparola,$select,$token);
$password_verify = password_verify($parola, $var['pwdUsers']);

if ($password_verify==true) {
  header("Location: ../reset.php?error=aceeasiparola");
  exit();
}

$mysql="UPDATE users SET pwdUsers=? WHERE mailUser=?";
$stmt=mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt,$mysql)) {
  header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
  exit();
}
$hash=password_hash($parola,PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt,"ss",$hash,$rand['mailReset']);
mysqli_stmt_execute($stmt);

$mysql="DELETE FROM resetare WHERE mailReset=?;";
$stmt=mysqli_stmt_init($connection);

if (!mysqli_stmt_prepare($stmt,$mysql)) {
  header("Location: ../newparola.php?error=mysqlerror&select=".$select."&valid=".$token);
  exit();
}

mysqli_stmt_bind_param($stmt,"s",$rand['mailReset']);
mysqli_stmt_execute($stmt);
header("Location: ../login.php?succes=resetare");
exit();

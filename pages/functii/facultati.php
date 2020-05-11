<?php
require './folderlogin/datacon.php';
require './functii/functii.php';

class facultate {
    public $Indexf;
    public $nume;
    public $universitate;
    public $judet;
    public $profil;
    public $compabilitate;
    public $link;
}

//GET USER INFO FROM DATABASE
if (isset($_SESSION['mailUser'])) {
  $mail = $_SESSION['mailUser'];
  $sql = "SELECT * FROM users WHERE mailUser=?";
}
if (isset($_SESSION['mailGmail'])) {
  $mail = $_SESSION['mailGmail'];
  $sql = "SELECT * FROM users_gmail WHERE mailGmail =?";
}
  $stmt=mysqli_stmt_init($connection);
  if (!mysqli_stmt_prepare($stmt,$sql))
  {
      header("Location: ./indexpp.php?error=mysqlerror");
      exit();
  }
  mysqli_stmt_bind_param($stmt,"s",$mail);
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  $user = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user[] = $row;
    }
}


// GET COLLEGES FROM DATABASE
$sql = "SELECT * FROM facultati";
$result = mysqli_query($connection,$sql);
$myArray = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }
}

$facultati = array();

// GET DATA
foreach ($myArray as $_facultate) {
    $temp = new facultate();
    $temp->Indexf=$_facultate['Indexf'];
    $temp->nume = $_facultate['Numef'];
    $temp->universitate = $_facultate['Universitatea'];
    $temp->judet = $_facultate['Judet'];
    $temp->profil = $_facultate['Profil'];
    $temp->compabilitate = getCompability($_facultate, $user);
    $temp->link = $_facultate['link_facultate'];
    array_push($facultati, $temp);
}

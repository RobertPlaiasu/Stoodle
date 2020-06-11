<?php
require './folderlogin/datacon.php';
session_start();

$tip = $_SESSION["tip"];
$id = $_SESSION["id"];

if (isset($_POST['adaugare'])) {
    $indef = $_POST["adaugare"];
    $sql = "INSERT INTO `favorite` (idUser, Indexf, tip) VALUES ('$id', '$indef', '$tip')";
    mysqli_query($connection, $sql);
}
else if (isset($_POST['scoatere'])) {
    $indef = $_POST["scoatere"];
    $sql = "DELETE FROM `favorite` WHERE `idUser`='$id' AND `Indexf`='$indef' AND `tip`='$tip'";
    mysqli_query($connection, $sql);
}else if (isset($_POST['scoatere_fav'])) {
    $indef = $_POST["scoatere_fav"];
    $sql = "DELETE FROM `favorite` WHERE `idUser`='$id' AND `Indexf`='$indef' AND `tip`='$tip'";
    mysqli_query($connection, $sql);
}

if(isset($_POST['scoatere_fav'])){
    header("Location: ./favorite.php");
    exit();
}

header("Location: ./homePage.php");
exit();
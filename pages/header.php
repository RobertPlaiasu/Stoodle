<?php
require './folderlogin/datacon.php';

//Check for previous session
if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){
    header("Location: ../index.php");
    exit();
}
if(isset($_SESSION['mailUser']))
{
    $mail = $_SESSION['mailUser'];
    $mysql="SELECT * FROM users WHERE mailUser=?";
}
if(isset($_SESSION['mailGmail']))
{
    $mail = $_SESSION['mailGmail'];
    $mysql="SELECT * FROM users_gmail WHERE mailGmail=?";
}

//Check the connection with database
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $mysql))
{
    header("Location: ../index.php");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $mail);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

// Check if the user completed the form
if(empty($row['Profil'])){
    header("Location: ./formularTemplate.php");
    exit();
}

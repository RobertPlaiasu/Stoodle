<?php
if (isset($_SESSION['mailUser'])){
    $mail=$_SESSION['mailUser'];
    $sql = "SELECT * FROM `users` WHERE `mailUser` = '$mail'";
    }

    if (isset($_SESSION['mailGmail'])){
    $mail=$_SESSION['mailGmail'];
    $sql = "SELECT * FROM `users_gmail` WHERE `mailGmail` = '$mail'";
    }
    $result = mysqli_query($connection,$sql);
    $myArray = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        if (isset($_SESSION['mailUser']))
            print "Salut, ".$row['Prenume'];
        else
            print "Salut, ".$row['prenumeGmail'];
        }
    }
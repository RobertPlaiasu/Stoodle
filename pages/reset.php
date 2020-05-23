<?php
    include './functii/functii.php';
    include 'autoloader/autoloader.php';

    session_start();
    if(isset($_SESSION['mailUser']) || isset($_SESSION['mailGmail'])){
        header("Location: ./homePage.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stoodle | Resetare Parola</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./CSS/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <?php
                getSecondErrorMessage("mysqlerror","Eroare baza de date!");
                getSecondErrorMessage("expire","Link-ul a expirat");
                getSecondErrorMessage("nouser","Nu exista cont!");
                getSuccesMessage("resetmail","Mail-ul pentru resetarea parolei a fost trimis!");
            ?>
            <div id="headline">
                <img src="./Images/logo.png" alt="Logo">
                <h1>Resetare parola</h1>
            </div>
            <form action="foldereset/resetphp.php" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder=" " id="email">
                    <label for="email">E-mail pentru resetarea parolei</label>
                </div>
                <small class="form-text alert-note">
                    <?php
                        getMainErrorMessage("emptymail","Completeaza campul!");
                        getMainErrorMessage("numail","Acesta adreasa de mail nu este una corecta!");
                        getMainErrorMessage("nucont","Nu exista cont cu aceasta adresa de email!");
                    ?>
                </small>

                <div class="form-group">
                    <a href="register.php">Creaza-ti un cont!</a> <br>
                    <a href="login.php">Inapoi la autentificare.</a>
                </div>

                <input type="submit" name="submit-reset" class="button" value="trimite">
            </form>
        </div>
    </body>
</html>

<?php
    include 'functii/functii.php';
    include 'autoloader/autoloader.php';
    require_once './folderlogin/google-config.php';
    session_start();
    if(isset($_SESSION['mailUser']) || isset($_SESSION['mailGmail'])){
    header("Location: ./homePage.php");
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stoodle | inregistrare</title>
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/login.css">
    </head>

    <body>
        <div class="container">
            <div id="headline">
                <img src="./Images/logo.png" alt="Logo">
                <h1>Inregistrare</h1>
            </div>
            <form action="folderlogin/signupphp.php" method="post">
                <div class="form-group">
                    <?php
                        getSecondErrorMessage("mysqlerror","Eroare baza de date!");
                        getSecondErrorMessage("invalidlink","Link-ul este invalid!");
                        getSecondErrorMessage("expire","Timpul pentru verificarea adresei de email a fost depasit trebuie sa completezi din nou formularul!");
                        getSecondErrorMessage("alttoken","Tokenul nu este bun!");
                        getSecondErrorMessage("eroaregenerala","Eroare aplicatie!");
                        getSuccesMessage("register","Te-ai inregistrat cu succes!Acum verifica adresa ta de email!");
                    ?>

                    <input type="text" name="username" class="form-control" placeholder=" " id="username">
                    <label for="username">Nume de utilizator</label> <!-- NU UITA CA ACUM AVEM DOAR USERNAME -->
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldnume","Completeaza toate campurile!");
                        getMainErrorMessage("invalidnume","Se pot folosi doar litere ale alfabetui englez!");
                        getMainErrorMessage("marenume","Numele este prea lung"); //TODO ROBERT: Daca isi face vreun indian cont? (numele lor sunt foarte lungi)
                    ?>
                </small>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder=" " id="email">
                    <label for="email">Email</label>
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldemail","Completeaza toate campurile!");
                        getMainErrorMessage("invalidmail","Email-ul este invalid");
                        getMainErrorMessage("mailother","Email-ul si confirmare email");
                        getMainErrorMessage("mailluat","Adresa de email este deja inregistrata!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="email" name="confirmEmail" class="form-control" placeholder=" " id="confirmEmail">
                    <label for="confirmEmail">Confirmare email</label>
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldemailrepeat","Completeaza toate campurile!");
                        getMainErrorMessage("invalidmailrepeat","Email-ul este invalid!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder=" " id="password">
                    <label for="password">Parola</label>
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldpass","Completeaza toate campurile!");
                        getMainErrorMessage("invalidpassw","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                        getMainErrorMessage("micpassw","Parola este prea sccurta trebuie sa aiba minim 8 caractere!");
                        getMainErrorMessage("marepassw","Parola este prea lunga poate sa aiba maxim 32 de caractere!");
                        getMainErrorMessage("identicpasswnume","Parola este asemanatoare  cu numele!");
                        getMainErrorMessage("identicpasswprenume","Parola este asemanatoare  cu prenumele!");
                        getMainErrorMessage("passwdother","Parola este diferita fata de cofirmare parola!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="password" name="confirmPassword" class="form-control" placeholder=" " id="confirmPassword">
                    <label for="confirmPassword">Confirmare parola</label>
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldpassrepeat","Completeaza toate campurile!");
                        getMainErrorMessage("micpasswrepeat","Parola este prea sccurta trebuie sa aiba minim 8 caractere!");
                        getMainErrorMessage("marepasswrepeat","Parola este prea lunga poate sa aiba maxim 32 de caractere!");
                        getMainErrorMessage("invalidpasswrepeat","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                    ?>
                </small>

                <a href="login.php"> Conecteaza-te! </a>
                <input type="submit" name="signupsubmit" value="Trimite" class="button" />
            </form>
        </div>
    </body>

</html>

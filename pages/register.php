<?php
    
    include 'autoloader/autoloader.php';
    

    $user = new UserView();

    $user->checkConnectedUserIsset();

    
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
                        $user->getSecondErrorMessage("mysqlerror","Eroare baza de date!");
                        $user->getSecondErrorMessage("invalidlink","Link-ul este invalid!");
                        $user->getSecondErrorMessage("expire","Timpul pentru verificarea adresei de email a fost depasit trebuie sa completezi din nou formularul!");
                        $user->getSecondErrorMessage("alttoken","Tokenul nu este bun!");
                        $user->getSecondErrorMessage("eroaregenerala","Eroare aplicatie!");
                        $user->getSuccesMessage("register","Te-ai inregistrat cu succes!Acum verifica adresa ta de email!");
                    ?>

                    <input type="text" name="username" class="form-control" placeholder=" " id="username">
                    <label for="username">Nume de utilizator</label> <!-- NU UITA CA ACUM AVEM DOAR USERNAME -->
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptyfieldnume","Completeaza toate campurile!");
                        $user->getMainErrorMessage("invalidnume","Se pot folosi doar litere ale alfabetui englez!");
                        $user->getMainErrorMessage("marenume","Numele este prea lung"); //TODO ROBERT: Daca isi face vreun indian cont? (numele lor sunt foarte lungi)
                    ?>
                </small>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder=" " id="email">
                    <label for="email">Email</label>
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptyfieldemail","Completeaza toate campurile!");
                        $user->getMainErrorMessage("invalidmail","Email-ul este invalid");
                        $user->getMainErrorMessage("mailother","Email-ul si confirmare email");
                        $user->getMainErrorMessage("mailluat","Adresa de email este deja inregistrata!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="email" name="confirmEmail" class="form-control" placeholder=" " id="confirmEmail">
                    <label for="confirmEmail">Confirmare email</label>
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptyfieldemailrepeat","Completeaza toate campurile!");
                        $user->getMainErrorMessage("invalidmailrepeat","Email-ul este invalid!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder=" " id="password">
                    <label for="password">Parola</label>
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptyfieldpass","Completeaza toate campurile!");
                        $user->getMainErrorMessage("invalidpassw","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                        $user->getMainErrorMessage("micpassw","Parola este prea sccurta trebuie sa aiba minim 8 caractere!");
                        $user->getMainErrorMessage("marepassw","Parola este prea lunga poate sa aiba maxim 32 de caractere!");
                        $user->getMainErrorMessage("identicpasswnume","Parola este asemanatoare  cu numele!");
                        $user->getMainErrorMessage("identicpasswprenume","Parola este asemanatoare  cu prenumele!");
                        $user->getMainErrorMessage("passwdother","Parola este diferita fata de cofirmare parola!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="password" name="confirmPassword" class="form-control" placeholder=" " id="confirmPassword">
                    <label for="confirmPassword">Confirmare parola</label>
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptyfieldpassrepeat","Completeaza toate campurile!");
                        $user->getMainErrorMessage("micpasswrepeat","Parola este prea sccurta trebuie sa aiba minim 8 caractere!");
                        $user->getMainErrorMessage("marepasswrepeat","Parola este prea lunga poate sa aiba maxim 32 de caractere!");
                        $user->getMainErrorMessage("invalidpasswrepeat","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                    ?>
                </small>

                <a href="login.php"> Conecteaza-te! </a>
                <input type="submit" name="signupsubmit" value="Trimite" class="button" />
            </form>
        </div>
    </body>

</html>

<?php
include 'functii/functii.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stoodle | Resetare Parola</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./CSS/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="conatiner">
            <?php
                getSecondErrorMessage("mysqlerror","Eroare baza de date!");
                getSecondErrorMessage("anothertoken","Tokenul este gresit");

                $select=$_GET['select'];
                $token=$_GET['valid'];

                if(empty($select)||empty($token)){
                    header("Location: ./reset.php?error=invalidlink");
                    exit();
                }
                if(ctype_xdigit($select)===true && ctype_xdigit($token)===true){
                    echo '<input type="hidden" name="select" value="'.$select.'">';
                    echo '<input type="hidden" name="token" value="'.$token.'">';
                }
            ?>
            <div id="headline">
                <img src="./Images/logo.png" alt="Logo">
                <h1>Resetare parola</h1>
            </div>
            <form action="foldereset/newparolaphp.php" method="post">
                <div class="form-group">
                    <input type="password" name="password" class="form-control">
                    <label for="password">Introdu noua parola</label>
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldpasswrepeat","Completeaza toate campurile!");
                        getMainErrorMessage("invalidpasswrepeat","Pentru repetare parola se pot folosi doar cifre si litere ale alfabetului englez!");
                        getMainErrorMessage("micpasswrepeat","Repetare parola este prea scurta trebuie sa aiba minim 8 caractere!");
                        getMainErrorMessage("marepasswrepeat","Parola este prea lunga poate sa aiba maxim 48 de caractere!");
                    ?>
                </small>

                <div class="form-group">
                    <input type="password" name="confirmPassword" class="form-control">
                    <label for="confirmPassword">Confirma noua parola</label>
                </div>
                <small>
                    <?php
                        getMainErrorMessage("emptyfieldpasswrepeat","Completeaza toate campurile!");
                        getMainErrorMessage("invalidpasswrepeat","Pentru repetare parola se pot folosi doar cifre si litere ale alfabetului englez!");
                        getMainErrorMessage("micpasswrepeat","Repetare parola este prea scurta trebuie sa aiba minim 8 caractere!");
                        getMainErrorMessage("marepasswrepeat","Parola este prea lunga poate sa aiba maxim 48 de caractere!");
                    ?>
                </small>
                
                <input type="submit" name="submit-parola-reset" class="button" value="trimite">
            </form>
        </div>
    </body>
</html>

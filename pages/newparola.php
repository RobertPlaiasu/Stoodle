<?php
include 'functii/functii.php';
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">
    <head>
        <title>Stoodle | Resetare Parola</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./CSS/login.css">
        <link rel="stylesheet" href="./CSS/base.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body style="height:100%!important">
        <div class="row" style="overflow: scroll;-webkit-overflow-scrolling: touch; height:100%!important">
            <div class="col-lg-7">
                <div id="text">
                    <h1>Stoodle</h1>
                    <p>Fii liber. Fii independent.</p>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center justify-content-center" id="content">
                <div class="conatiner">
                    <form action="foldereset/newparolaphp.php" method="post">
                        <div class="form-group row">
                          <?php
                          getSecondErrorMessage("mysqlerror","Eroare baza de date!");
                          getSecondErrorMessage("anothertoken","Tokenul este gresit")
                           ?>
                            <div class="col-lg-6">
                              <?php
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

                                <label for="exampleInputPassword1">Parolă</label>
                                <input type="password" name="resetparola" class="form-control">
                                <small class="form-text alert-note">
                                    <?php
                                    getMainErrorMessage("emptyfieldpassw","Completeaza toate campurile!");
                                    getMainErrorMessage("invalidpassw","Pentru parola se pot folosi doar cifre si litere ale alfabetului englez!");
                                    getMainErrorMessage("micpassw","Parola este prea scurta trebuie sa aiba minim 8 caractere!");
                                    getMainErrorMessage("marepassw","Parola este prea lunga poate sa aiba maxim 48 de caractere!");
                                    getMainErrorMessage("identicpasswnume","Parola este asemanatoare  cu numele!");
                                    getMainErrorMessage("identicpasswprenume","Parola este asemanatoare  cu prenumele!");
                                    getMainErrorMessage("difparola","Parola este diferita fata de cofirmare parola!");
                                    getMainErrorMessage("aceeasiparola","Parola este asemanatoare cu cea veche!")
                                    ?>
                                </small>
                            </div>

                            <div class="col-lg-6">
                                <label for="exampleInputPassword1"> Confirmare Parolă</label>
                                <input type="password" name="resetconfirmareparola" class="form-control">
                                <small class="form-text alert-note">
                                    <?php
                                    getMainErrorMessage("emptyfieldpasswrepeat","Completeaza toate campurile!");
                                    getMainErrorMessage("invalidpasswrepeat","Pentru repetare parola se pot folosi doar cifre si litere ale alfabetului englez!");
                                    getMainErrorMessage("micpasswrepeat","Repetare parola este prea scurta trebuie sa aiba minim 8 caractere!");
                                    getMainErrorMessage("marepasswrepeat","Parola este prea lunga poate sa aiba maxim 48 de caractere!");
                                    ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" name="submit-parola-reset" class="button">Creează cont</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>

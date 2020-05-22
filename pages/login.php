<?php
require 'folderlogin/google-config.php';
include 'functii/functii.php';
require_once './folderlogin/google-config.php';
session_start();
if (isset($_SESSION['mailUser']) || isset($_SESSION['mailGmail'])) {
    header("Location: ./homePage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stoodle | Conectare</title>
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./CSS/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div id="headline">
                <img src="./Images/logo.png" alt="Logo">
                <h1>Autentificare</h1>
            </div>
            <form action="folderlogin/loginphp.php" method="post">
                <div class="form-group">
                    <?php
                        getSecondErrorMessage("sqlierror","Eroare server!");
                        getSecondErrorMessage("fatalerrorsql","Eroare aplicatie!");
                        getSuccesMessage("resetare","Parola a fost schimbata");
                        getSuccesMessage("register","Verifica adresa de email pentru a te putea loga!");
                    ?>
                    <input type="email" class="form-control" placeholder=" " id="email" />
                    <label for="email">Email</label>
                </div>
                <small class="form-text alert-note">
                    <?php
                        getMainErrorMessage("emptymail",'Completeaza campul !');
                        getMainErrorMessage("nuUser",'Email-ul nu a fot gasit!');
                        getMainErrorMessage("invalidmailuserid",'Email-ul este invalid!');
                    ?>
                </small>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder=" " id="password" />
                    <label for="password">Parola</label>
                       
                </div>
                <small class="form-text alert-note">
                    <?php
                        getMainErrorMessage("emptypass","Completeaza campul");
                        getMainErrorMessage("invalidpassw","Pentru parola se folosesc doar caractere a alfabetui englez si cifrele de la 0-9!");
                        getMainErrorMessage("parolagresita","Combinatia email si parola este gresita");
                    ?>
                </small> 
                <a href="./register.php">Creeaza-ti un cont!</a>

                <a class="btn btn-outline-dark" 
                    <?php echo 'href="'.$client->createAuthUrl().'"' ?>  
                    role="button" style="text-transform:none; width: 100%; padding: 1em; margin: .3em 0;">
                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" 
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                    Login with Google
                </a>
                
                <input type="submit" name="loginsubmit" class="button" />
            </form>
        </div>
        <!-- <div class="row">

            <div class="col-lg-7">
                <div id="text">
                    <h1>Stoodle</h1>
                    <p>Fii liber. Fii independent.</p>
                </div>
            </div>

            <div class="col-lg-5 d-flex align-items-center justify-content-center content" id="content">
                <div class="conatiner">
                    <h1>Continuă aventura</h1>

                    <form action="folderlogin/loginphp.php" method="post">
                        <div class="form-group">

                            <?php
                                getSecondErrorMessage("sqlierror","Eroare server!");
                                getSecondErrorMessage("fatalerrorsql","Eroare aplicatie!");
                                getSuccesMessage("resetare","Parola a fost schimbata");
                                getSuccesMessage("register","Verifica adresa de email pentru a te putea loga!");
                            ?>

                            <label for="exampleInputEmail1">Email</label>

                            <?php
                                if(isset($_GET['mailuserid'])){
                                    echo '<input type="email" name="mailus" class="form-control" value="'.$_GET['mailuserid'].'" id="exampleInputEmail1" aria-describedby="emailHelp">';
                                }
                                else {
                                    echo '<input type="email" name="mailus" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
                                }
                            ?>

                            <small id="emailHelp" class="form-text alert-note">

                                <?php
                                    getMainErrorMessage("emptymail",'Completeaza campul !');
                                    getMainErrorMessage("nuUser",'Email-ul nu a fot gasit!');
                                    getMainErrorMessage("invalidmailuserid",'Email-ul este invalid!');
                                ?>

                            </small>

                        </div>

                        <div class="form-group">

                            <label for="exampleInputPassword1">Parolă</label>
                            <input type="password" name="passw" class="form-control" id="exampleInputPassword1">
                            <small id="emailHelp" class="form-text alert-note">
                                <?php
                                    getMainErrorMessage("emptypass","Completeaza campul");
                                    getMainErrorMessage("invalidpassw","Pentru parola se folosesc doar caractere a alfabetui englez si cifrele de la 0-9!");
                                    getMainErrorMessage("parolagresita","Combinatia email si parola este gresita");
                                ?>
                            </small>

                        </div>


                        <a href="register.php">
                            Nu ai cont? <span>Înregistrează-te</span>
                        </a>
                        <br>
                        <a href="reset.php">
                             Ai uitat parola?<span>Schimb-o</span>
                        </a>
                        <div class="form-group form-check">

                            <input type="checkbox" class="form-check-input" name="checkbox" value="1" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ține-mă minte.</label>

                        </div>



                        <a class="btn btn-outline-dark" <?php echo 'href="'.$client->createAuthUrl().'"' ?>  role="button" style="text-transform:none; width: 100%; padding: 1em; margin: .3em 0;">
                            <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                            Login with Google
                        </a>


                        <button type="submit" name="loginsubmit" class="button">Logare</button>
                    </form>

                </div>
            </div>
        </div> -->
    </body>

</html>

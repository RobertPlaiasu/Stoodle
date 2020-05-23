<?php
    require_once './folderlogin/google-config.php';
    include 'autoloader/autoloader.php';

    $user = new UserView();

    $user->checkConnectedUserIsset();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stoodle | Conectare</title>
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="CSS/login.css" />
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
                        $user->getSecondErrorMessage("sqlierror","Eroare server!");
                        $user->getSecondErrorMessage("fatalerrorsql","Eroare aplicatie!");
                        $user->getSuccesMessage("resetare","Parola a fost schimbata");
                        $user->getSuccesMessage("register","Verifica adresa de email pentru a te putea loga!");
                    ?>
                    <input type="email" name="mail" class="form-control" placeholder=" " id="email" />
                    <label for="email">Email</label>
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptymail",'Completeaza campul !');
                        $user->getMainErrorMessage("nuUser",'Email-ul nu a fot gasit!');
                        $user->getMainErrorMessage("invalidmailuserid",'Email-ul este invalid!');
                    ?>
                </small>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder=" " id="password" />
                    <label for="password">Parola</label>
                       
                </div>
                <small>
                    <?php
                        $user->getMainErrorMessage("emptypass","Completeaza campul");
                        $user->getMainErrorMessage("invalidpassw","Pentru parola se folosesc doar 
                                                    caractere a alfabetui englez si cifrele de la 0-9!");
                        $user->getMainErrorMessage("parolagresita","Combinatia email si parola este gresita");
                    ?>
                </small> 
                <div class="form-group">
                    <a href="./register.php">Creeaza-ti un cont!</a><br>
                    <a href="./reset.php">Reseteaza-ti parola!</a>
                </div>

                <a class="btn btn-outline-dark" 
                    <?php echo 'href="'.$client->createAuthUrl().'"' ?>  
                    role="button" style="text-transform:none; width: 100%; padding: 1em; margin: .3em 0;">
                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" 
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                    Login with Google
                </a>
                
                <input type="submit" name="loginsubmit" value="Trimite" class="button" />
            </form>
        </div>
    </body>

</html>

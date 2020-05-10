<?php
include './functii/functii.php';
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">
    <head>
        <title>Stoodle | Resetare Parola</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                    <form action="./foldereset/resetphp.php" method="post">
                        <?php
                        erore2("mysqlerror","Eroare baza de date!");
                        erore2("expire","Link-ul a expirat");
                        erore2("nouser","Nu exista cont!");
                        succes("resetmail","Mail-ul pentru resetarea parolei a fost trimis!");

                        ?>
        <h1>Resetare parola</h1>
        <div class="form-group row">
            <label for="exampleInputEmail1">E-mail</label>
            <?php
            if(isset($_GET['email'])){
                echo '<input type="email" name="mailreset" value="'.$_GET['email'].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
            }
            else {
                echo '<input type="email" name="mailreset" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
            }
            ?>
              <small class="form-text alert-note">
                <?php
                erore1("emptymail","Completeaza campul!");
                erore1("numail","Acesta adreasa de mail nu este una corecta!");
                erore1("nucont","Nu exista cont cu aceasta adresa de email!");
                 ?>
              </small>
        </div>
        <button type="submit" name="submit-reset" class="button">Trimite mail</button>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

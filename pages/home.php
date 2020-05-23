<?php

include 'autoloader/autoloader.php';

$user = new UserView();

$user->checkFormCompleted();



?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../logo.ico" type="image/x-icon" />

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- MY CSS -->
        <link rel="stylesheet" href="./CSS/navbar.css">
        <link rel="stylesheet" href="./CSS/homePage.css">
        <link rel="stylesheet" href="./CSS/base.css">

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/0dfb644902.js" crossorigin="anonymous"></script>
        <title>Stoodle</title>
    </head>

    <body>
        <!-- SIDE BAR -->
        <?php
            $user->echoNavbar();
        ?>
        <div id="search">
            <input onkeyup="sort()" class="form-control w-75"
                   type="text" placeholder="cauta" id="search_field" aria-label="Search">
        </div>

        <!-- PAGE CONTENT -->

        <main class="container">
            <!-- CARD SHOWCASE -->

            <div class="alert alert-danger alert-dismissible fade show hidden formular-alert"role="alert">
                <strong>Atentie !</strong>
                <button type="button" class="close" onclick="alert();">
                    <span aria-hidden="true">&times;</span>
                </button>
                <hr>
                Va trebui sa raspunzi din nou la toate intrebarile din formular. Raspunsuri vor fi modificate doar la finalul acestuia. <br>
                <a href="./formularTemplate.php">Doresc sa continui</a>
            </div>

            <script>
                function alert(){
                    $(".formular-alert").toggleClass("hidden");
                }
            </script>

            <div id="showcase">
                <div class="row">
                    <?php
                        $user->echoAllColleges();
                    ?>
                </div>
            </div>
        </main>
        
        <!-- SCRIPTING -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="./JS/home.js"></script>
    </body>
</html>

<?php
require './folderlogin/datacon.php';
session_start();

if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){
    header("Location: ../index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/navbar.css">
        <link rel="stylesheet" href="./CSS/base.css">
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <script src="https://kit.fontawesome.com/0dfb644902.js" crossorigin="anonymous"></script>
        <title>Stoodle</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#">
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
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">☰</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="flex-direction: row-reverse;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./homePage.php" class="nav-link">Acasa</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="alert();" class="nav-link">Formular</a>
                    </li>
                    <li class="nav-item">
                        <a href="./contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="./favorite.php" class="nav-link">Facultati favorite</a>
                    </li>
                    <li class="nav-item">
                        <a href="./faq.php" class="nav-link">Intrebari</a>
                    </li>
                    <li class="nav-item">
                        <a href="./folderlogin/deconectphp.php" class="nav-link"> Deconectare</a>
                    </li>
                </ul>
            </div>
        </nav>

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
        <div id="showcase" style="margin: 0 10rem;">
            <?php
            $array = array(
                (object) array(
                    "enunt" => "Ce este Stoodle?",
                    "raspuns" => "Stoodle este o platforma online ce vine in ajutorul tinerilor ce sunt in cautarea unei facultati."
                ),
                (object) array(
                    "enunt" => "Cat costa sa ma inscriu pe aceasta platforma?",
                    "raspuns" => "Platforma este gratuita in momentul de fata."
                ),
                (object) array(
                    "enunt" => "Ce face Stoodle cu datele mele ?",
                    "raspuns" => "Stoodle foloseste datele tale doar pentru a creea o experienta cat mai buna a dumneavoastra cand utilizati platforma,cu asigurarea ca nu vor fi impartasite cu nimeni."
                ),
                (object) array(
                    "enunt" => "Care este viziunea aplicatiei in viitor?",
                    "raspuns" => "In viitor , aplicatia isi propune sa customizeze cu cat mai mult experienta fiecarui utilizator,imbunatatind algoritmul de sortare al facultatilor.In acelasi timp isi propune sa adauge un sistem comentarii pentru fiecare facultate si un forum. pentru a permite utilazatorilor sa schimbe pareri despre facultati."
                ),
                (object) array(
                    "enunt" => "Cum a pornit ideea acestui site?",
                    "raspuns" => "Totul a pornit cand cei ce au creat aplicatia doreau sa se orienteze spre o facultate, dar nu au gasit o aplicatie web ccare sa raspunda la toate cerintele, asa
luand nastere Stoodle."
                ),
                (object) array(
                    "enunt" => "Care este cea mai mare calitate a acestei aplicatii web?",
                    "raspuns" => "Stoodle va pune intotdeauna utilizatorul pe primul plan, totul bazandu-se pe alegerile facute de acesta.
"
                ),
                (object) array(
                    "enunt" => "In ce stadiu al constructiei este in acest moment aplicatia ?",
                    "raspuns" => "Aplicatia este in stadiul de beta platformei inca trebuind sa i se adauge cateva mici imbunatatiri.
"
                ),
            );
            foreach ($array as $intrebare){
                echo "
                        <div style='margin: 2rem 0'>
                            <h1 style='margin: 0'>".$intrebare->enunt." </h1>
                            <p style='width: 80%;'>".$intrebare->raspuns." </p>
                        </div>
                    ";
            }
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    </body>
</html>

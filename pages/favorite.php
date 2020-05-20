<?php
require './folderlogin/datacon.php';
session_start();

if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){
    header("Location: ../index.php");
    exit();
}

if(isset($_SESSION['mailUser']))
{
    $mail = $_SESSION['mailUser'];
    $mysql="SELECT * FROM users WHERE mailUser=?";
}

if(isset($_SESSION['mailGmail']))
{
    $mail = $_SESSION['mailGmail'];
    $mysql="SELECT * FROM users_gmail WHERE mailGmail=?";
}

$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $mysql))
{
    header("Location: ../index.php");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $mail);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

if(empty($row['Profil'])){
    header("Location: ./formularTemplate.php");
    exit();
}

// Get the type and id of the user
if(isset($_SESSION['mailGmail'])){
    $_SESSION["tip"] = "gmail";
    $_SESSION["id"] = $row["idGmail"];
}

if(isset($_SESSION['mailUser'])){
    $_SESSION["tip"] = "normal";
    $_SESSION["id"] = $row["idUser"];
}

$tip = $_SESSION["tip"];
$id = $_SESSION["id"];

$sql = "SELECT * FROM `favorite` WHERE `idUser` = '$id' AND `tip` = '$tip'";
$result = mysqli_query($connection,$sql);
$favorite = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row_fav = $result->fetch_assoc()) {
        $favorite[] = $row_fav['Indexf'];
    }
}

sort($favorite);
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
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#">
                <?php
                    if (isset($row['prenumeGmail']))
                        print "Salut, ".$row['prenumeGmail'];
                    else if (isset($row['Prenume']))
                        print "Salut, ".$row['Prenume'];
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
                    require './functii/facultati.php';
                    usort($facultati,function($first,$second){
                        return $first->compabilitate < $second->compabilitate;
                    });
                    $ok=true;
                    // PRINT DATA
                    foreach ($facultati as $card) {
                        if(!binarySearch($favorite, $card->Indexf))
                            continue;
                        else
                            $ok=false;
                    ?>
                    <!--Print the card-->
                    <div class="col card">
                        <!--Image Background-->
                        <div class="row-lg-4 backgrounded"></div>
                        <!--Print the proprities-->
                        <div class="row-lg-2 name">
                            <?php
                        echo $card->nume;
                            ?>
                        </div>
                        <div class="row-lg-3 prop text-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <?php
                        echo $card->universitate;
                                        ?>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <?php
                        echo $card->compabilitate
                                        ?>
                                        <i class="fas fa-percentage"></i></div>
                                    <div class="col">
                                        <?php
                            echo $card->judet;
                                        ?>
                                        <i class="fas fa-city"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <?php
                        echo $card->profil;
                                        ?>
                                        <i class="fas fa-code-branch"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-lg-3 fav text-center">
                            <form action="./favoriteAlg.php" method="post">
                                <?php
                            echo '<button id="favorite" style="all: unset" name="scoatere_fav" id="'.$card->Indexf.'" value="'.$card->Indexf.'"><i class="fas fa-heart"></i> Scoate de la favorite</button>';
                                ?>
                            </form>
                        </div>
                        <div class="row-lg-3 extra text-center">
                            <a href="
                                     <?php
                        echo $card->link;
                                     ?>
                                     " target="_blank">Afla mai mult</a>
                        </div>
                    </div>
                    <?php }
                        if($ok)
                            echo "<div class='display-4'>Nu ai facultati favorite</div>";
                    ?>

                </div>
            </div>
        </main>
        <!-- SCRIPTING -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#favorite').on('click', function(e){
                    e.preventDefault();
                    $.ajax({
                        url: 'path/to/script.php',
                        type: 'POST',
                        data: {liked: false},
                        cache: false,
                        success: function(data){
                            alert(data);
                        }
                    });
                });
            });
        </script>
        <script src="./JS/homepage.js"></script>
    </body>
</html>

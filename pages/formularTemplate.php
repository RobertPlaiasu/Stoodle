<?php

include 'array.php';
include 'functii/functii.php';
session_start();
require_once './folderlogin/datacon.php';


if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){

    $select=$_GET['select'];
    $token=$_GET['valid'];
    $date=date("U");

    if(empty($select)||empty($token)){
        header("Location: ./register.php?error=invalidlink");
        exit();
    }
    if(ctype_xdigit($select)===true && ctype_xdigit($token)===true){

        $mysql="SELECT * FROM users_verificare WHERE expireVerificare>=? AND selectVerificare =?";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt,$mysql))
        {
            header("Location: ./register.php?error=mysqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"ss",$date,$select);
        mysqli_stmt_execute($stmt);
        $rezultat=mysqli_stmt_get_result($stmt);
        if(!$rand=mysqli_fetch_assoc($rezultat))
        {
            $mysql="DELETE FROM users_verificare WHERE selectVerificare=?;";
            $stmt=mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt,$mysql))
            {
                header("Location: ./register.php?error=mysqlerror");
                exit();
            }
            mysqli_stmt_bind_param($stmt,"s",$select);
            mysqli_stmt_execute($stmt);
            header("Location: ./register.php?error=expire");
            exit();
        }
        $ok=password_verify($token,$rand['tokenVerificare']);
        if($ok===false){
            header("Location: ./register.php?error=alttoken");
            exit();
        }
        elseif($ok===true)
        {

            $mysql="INSERT INTO users(Nume,Prenume,mailUser,pwdUsers) VAlUES(?,?,?,?) ";
            $stmt=mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt,$mysql)) {
                header("Location: ./register.php?error=mysqlerror&select=".$select."&valid=".$token);
                exit();
            }
            mysqli_stmt_bind_param($stmt,"ssss",$rand['numeVerificare'],$rand['prenumeVerificare'],$rand['mailVerificare'],$rand['parolaVerificare']);
            mysqli_stmt_execute($stmt);


            $id=$rand['idVerificare'];
            $_SESSION['mailUser']=$rand['mailVerificare'];
            $mysql="DELETE FROM users_verificare WHERE idVerificare='$id'";
            mysqli_query($connection,$mysql);

        }
        else {
            header("Location: ./register.php?error=eroaregenerala");
            exit();
        }
    }
    else {
        header("Location: ./register.php?error=invalidlink");
        exit();
    }
}




?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/variabiles.css">
        <link rel="stylesheet" href="./CSS/base.css">
        <title>Stoodle</title>
    </head>

    <body style="overflow: hidden;">
        <style>
            label {
                font-size: 4em;
                margin: 4rem 0;
                text-align: center
            }
            select{
                padding: 1rem;
            }
        </style>
      <?php
      erore2('materii','Trebuie sa mai completezi inca o data formularul pentru ca ca 2 materii sunt asemanatoare!');
       ?>
        <form action="./formular.php" method="post" id="formular">

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>De ce esti pasionat?</label>
                    <select name="pasiune">
                        <?php
                        foreach ($array_pasiune as $tip)
                            echo "<option value='".$tip."'>".$tip."</option>";
                        ?>
                    </select>
                    <input type="button" value="Urmatoare intrebare" onclick="nextQuestion()" class="button">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Cat de mult esti pasionat pe o scara de la 1 la 5 ?</label>
                    <select name="intensitate_pasiune">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Vrei un part-time job?</label>
                    <select name="job">
                        <option value="0">Da</option>
                        <option value="1">Nu</option>
                    </select>
                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>

            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Care sunt materiile tale preferate ?(Sa nu fie toate la fel)</label>
                    <select name="materie1">
                        <?php
                        foreach ($array_materie as $materie)
                            echo "<option value='".$materie."'>".$materie."</option>";
                        ?>
                    </select>
                    <select name="materie2">
                        <?php
                        foreach ($array_materie1 as $materie)
                            echo "<option value='".$materie."'>".$materie."</option>";
                        ?>
                    </select>
                    <select name="materie3">
                        <?php
                        foreach ($array_materie1 as $materie)
                            echo "<option value='".$materie."'>".$materie."</option>";
                        ?>
                    </select>
                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center">
                    <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                        <label>Ce tip de carti iti place sa citesti?</label>
                        <select name="carti">
                            <?php
                            foreach ($array_carti as $tip)
                                echo "<option value='".$tip."'>".$tip."</option>";
                            ?>
                        </select>
                        <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                    </div>
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Din ce judet esti?</label>
                    <select name="judet">
                        <?php
                        foreach ($array_judet as $tip)
                            echo "<option value='".$tip."'>".$tip."</option>";
                        ?>
                    </select>
                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Te consideri o persoana sociabila?</label>
                    <select name="social">
                        <option value="1">Da</option>
                        <option value="0">Nu</option>
                    </select>
                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Practici vreun sport ?</label>
                    <select name="sport">
                        <option value="1">Da</option>
                        <option value="0">Nu</option>
                    </select>
                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Pe ce profil esti ?</label>
                    <select name="profil">
                        <?php
                        foreach ($array_profil as $tip)
                            echo "<option value='".$tip."'>".$tip."</option>";
                        ?>
                    </select>
                    <input type="button" onclick="nextQuestion()" class="button" value="Urmatoare intrebare">
                </div>
            </div>

            <div class="row" style="height:100vh">
                <div class="col flex-column d-flex justify-content-center align-items-center" style="height:100vh">
                    <label>Consideri ca poti ca poti face fata unor situatii foarte stresante?</label>
                    <select name="stres">
                        <option value="1">Da</option>
                        <option value="0">Nu</option>
                    </select>
                    <br />

                    <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
                </div>
            </div>

        </form>

        <script>
            var questions = document.getElementById("formular").children;
            var index = 0;

            function nextQuestion(select_name) {
                questions[index].style.display = "none";
                $(questions[index]).addClass("hidden");
                index += 1;
            }
          </script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   </body>
    </body>

</html>

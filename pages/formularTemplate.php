<?php

include 'functii/functii.php';
require_once './folderlogin/datacon.php';

session_start();

function checkTokens($select, $token){
    // If the tokens are empty and consists of all hexadecimal digits.
    if( empty($select) || empty($token) || !(ctype_xdigit($select) || !ctype_xdigit($token))){
        header("Location: ./register.php?error=invalidlink");
        exit();
    }
}

function checkDatabase($stmt, $mysql){
    if (!mysqli_stmt_prepare($stmt,$mysql))
    {
        header("Location: ./register.php?error=mysqlerror");
        exit();
    }
}

function checkPassword($token, $tokenVerificare){

    $ok=password_verify($token, $tokenVerificare);
    if(!$ok){
        header("Location: ./register.php?error=alttoken");
        exit();
    }

}

if(empty($_SESSION['mailUser']) && empty($_SESSION['mailGmail'])){

    $select=$_GET['select'];
    $token=$_GET['valid'];
    $date=date("U");

    checkTokens($select, $token);

    $mysql="SELECT * FROM users_verificare WHERE expireVerificare>=? AND selectVerificare =?";
    $stmt=mysqli_stmt_init($connection);
    
    checkDatabase($stmt, $mysql);

    mysqli_stmt_bind_param($stmt,"ss",$date,$select);
    mysqli_stmt_execute($stmt);
    $rezultat=mysqli_stmt_get_result($stmt);

    if(!$rand=mysqli_fetch_assoc($rezultat))
    {
        $mysql="DELETE FROM users_verificare WHERE selectVerificare=?;";
        $stmt=mysqli_stmt_init($connection);

        checkDatabase($stmt, $mysql);

        mysqli_stmt_bind_param($stmt,"s",$select);
        mysqli_stmt_execute($stmt);

        header("Location: ./register.php?error=expire");
        exit();
    }

    checkPassword($token, $rand['tokenVerificare']);
    
    $mysql="INSERT INTO users(Nume,Prenume,mailUser,pwdUsers) VAlUES(?,?,?,?) ";
    $stmt=mysqli_stmt_init($connection);

    checkDatabase($stmt, $mysql);

    mysqli_stmt_bind_param($stmt,"ssss",$rand['numeVerificare'],$rand['prenumeVerificare'],$rand['mailVerificare'],$rand['parolaVerificare']);
    mysqli_stmt_execute($stmt);

    $id=$rand['idVerificare'];
    $_SESSION['mailUser']=$rand['mailVerificare'];

    $mysql="DELETE FROM users_verificare WHERE idVerificare='$id'";
    mysqli_query($connection,$mysql);

}




?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./CSS/formular.css">
        <link rel="icon" href="../logo.ico" type="image/x-icon" />
        <title>Stoodle | Formular</title>
    </head>

    <body>
        <div class="container">
        <h1>Bun venit in familia Stoodle!</h1>
        <p>Completeaza formularul de mai jos pentru a putea termina inregistrarea.</p>
        <form action="./formular.php" method="post" id="formular">
            <div class="form-group">
                <label for="passion">De ce esti pasionat?</label>
                <select class="custom-select" id="passionSelect" name="passion"></select>
            </div>
            <div class="form-group">
            <label for="passion-metter">Cat de pasionat esti?</label> <br>
                <input class="radio" type="radio" name="passionIntensity" id="budget-1" value="1" checked>
                    <label class="for-radio" for="budget-1">
                        <span data-hover="1">1</span>
                    </label>
                <input class="radio" type="radio" name="passionIntensity" id="budget-2" value="2">
                    <label class="for-radio" for="budget-2">							
                        <span data-hover="2">2</span>
                    </label>    
                <input class="radio" type="radio" name="passionIntensity" id="budget-3" value="3">
                    <label class="for-radio" for="budget-3">							
                        <span data-hover="3">3</span>
                    </label>
                <input class="radio" type="radio" name="passionIntensity" id="budget-4" value="4">
                    <label class="for-radio" for="budget-4">							
                        <span data-hover="4">4</span>
                    </label>
                <input class="radio" type="radio" name="passionIntensity" id="budget-5" value="5">
                    <label class="for-radio" for="budget-5">							
                        <span data-hover="5">5</span>
                    </label>
            </div>
            <div class="form-group">
                <label for="classes">Ce materii iti plac?</label>
                <select class="custom-select mb-2 classSelect" name="class-1" class="classSelect"></select>
                <select class="custom-select mb-2 classSelect" name="class-2" class="classSelect"></select>
                <select class="custom-select mb-2 classSelect" name="class-3" class="classSelect"></select>
            </div>
            <div class="form-group">
                <label for="branch">Pe ce profil esti?</label>
                <select class="custom-select" name="branch" id="branchSelect"></select>
            </div>
            <div class="form-group">
                <label for="stress">Poti face fata unor situatii strsante?</label>
                <select class="custom-select" name="stress" id="passionSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="job">Iti doresti un part-time job?</label>
                <select class="custom-select" name="job" id="jobSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="books">Ce tip de carti citesti?</label>
                <select class="custom-select" name="books" id="booksSelect"></select>
            </div>
            <div class="form-group">
                <label for="county">Din ce judet esti?</label>
                <select class="custom-select" name="county" id="countyPassion"></select>
            </div>
            <div class="form-group">
                <label for="social">Te consideri o persoana sociabila?</label>
                <select class="custom-select" name="social" id="socialSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>   
                </select>
            </div>
            <div class="form-group">
                <label for="sport">Practici vreun sport?</label>
                <select class="custom-select" name="sport" id="sportSelect">
                    <option value="1">Da</option>
                    <option value="0">Nu</option>                       
                </select>
            </div>
            <input type="submit" value="Trimite Formular" name="formularsubmit" class="button">
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="../JS/formular.js"></script>
    </body>

</html>

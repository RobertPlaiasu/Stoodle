<?php
require 'password.php';
 if(isset($_POST['signupsubmit'])){

   require 'datacon.php';
   $nume=$_POST['nume'];
   $prenume=$_POST['prenume'];
   $email=$_POST['email'];
   $email_repeat=$_POST['confirmail'];
   $password=$_POST['passw'];
   $password_repeat=$_POST['passw-repeat'];
   $checkbox=$_POST['checkbox'];

/*empty field*/
  function emptyField($var,$nume,$prenume,$email,$email_repeat,$msg){
    if(empty($var)){
      $msg="Location: ../register.php?error=emptyfield".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
     }
  }

/*validate nume, prenume*/
  function validateVarNume($var,$nume,$prenume,$email,$email_repeat,$msg){
    if(!preg_match("/^[a-zA-Z]*$/", $var)) {
      $msg="Location: ../register.php?error=invalid".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
    }
    if (strlen($var)>24) {
      $msg="Location: ../register.php?error=mare".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
    }
  }


/*filter validate mail*/


  function validateEmail($var,$nume,$prenume,$email,$email_repeat,$msg)
  {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $msg="Location: ../register.php?error=invalid".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
    }
  }

  /*validate parola*/
  function validateVarParola($var,$nume,$prenume,$email,$email_repeat,$password,$password_repeat,$msg){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $var)) {
      $msg="Location: ../register.php?error=invalid".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
    }
    if (strlen($var)<8) {
      $msg="Location: ../register.php?error=mic".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
    }
    if(strlen($var)>48) {
      $msg="Location: ../register.php?error=mare".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();
    }
  }

  /*parola vulnerabila*/
  function vulnerabilaParola($nume,$prenume,$email,$email_repeat,$password,$password_repeat){
    if (strpos(strtolower($nume),strtolower($password))!==false) {
      header("Location: ../register.php?error=identicpasswnume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
      exit();
    }
    if (strpos(strtolower($password),strtolower($nume))!==false) {
      header("Location: ../register.php?error=identicpasswnume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
      exit();
    }
    if (strpos(strtolower($prenume),strtolower($password))!==false) {
      header("Location: ../register.php?error=identicpasswprenume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
      exit();
    }
    if (strpos(strtolower($password),strtolower($prenume))!==false) {
      header("Location: ../register.php?error=identicpasswprenume&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
      exit();
    }
  }

  /*verifica diferentele*/
  function difVar($var1,$var2,$nume,$prenume,$email,$email_repeat,$msg){
    if ($var1!==$var2) {
      $msg="Location: ../register.php?error=".$msg."&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat;
       header($msg);
       exit();

   }
  }

  /* empty field */
   emptyField($nume,$nume,$prenume,$email,$email_repeat,"nume");
   emptyField($prenume,$nume,$prenume,$email,$email_repeat,"prenume");
   emptyField($email,$nume,$prenume,$email,$email_repeat,"email");
   emptyField($email_repeat,$nume,$prenume,$email,$email_repeat,"emailrepeat");
   emptyField($password,$nume,$prenume,$email,$email_repeat,"pass");
   emptyField($password_repeat,$nume,$prenume,$email,$email_repeat,"passrepeat");
   /*filtere*/

   validateEmail($email,$nume,$prenume,$email,$email_repeat,"email");
   validateEmail($email,$nume,$prenume,$email,$email_repeat,"emailrepeat");


   validateVarNume($nume,$nume,$prenume,$email,$email_repeat,"nume");
   validateVarNume($prenume,$nume,$prenume,$email,$email_repeat,"prenume");

   validateVarParola($password,$nume,$prenume,$email,$email_repeat,$password,$password_repeat,"passw");
   validateVarParola($password_repeat,$nume,$prenume,$email,$email_repeat,$password,$password_repeat,"passwrepeat");

   vulnerabilaParola($nume,$prenume,$email,$email_repeat,$password,$password_repeat);

   difVar($email,$email_repeat,$nume,$prenume,$email,$email_repeat,"mailother");
   difVar($password,$password_repeat,$nume,$prenume,$email,$email_repeat,"passwdother");

        $mysql="SELECT mailUser FROM users WHERE mailUser=?";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt,$mysql)) {
          header("Location: ../register.php?error=mysqlerror&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
          exit();
        }
          mysqli_stmt_bind_param($stmt,"s",$email);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $rezultat_email=mysqli_stmt_num_rows($stmt);

          if($rezultat_email>0){
            header("Location: ../register.php?error=mailluat&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
            exit();
          }
              require("../foldereset/PHPMailer/src/PHPMailer.php");
              require("../foldereset/PHPMailer/src/SMTP.php");
              require("../foldereset/PHPMailer/src/Exception.php");

              $select=bin2hex(random_bytes(12));
              $token=bin2hex(random_bytes(32));

              $link="http://localhost/Stoodle/pages/formularTemplate.php?select=".$select."&valid=".$token;
              $end=date("U")+24*60*60;

              $mysql="DELETE FROM users_verificare WHERE mailVerificare=?;";
              $stmt=mysqli_stmt_init($connection);
              if (!mysqli_stmt_prepare($stmt,$mysql)) {
                header("Location: ../register.php?error=mysqlerror&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
                exit();
              }
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);


                $mysql="INSERT INTO users_verificare(numeVerificare,prenumeVerificare,mailVerificare,parolaVerificare,selectVerificare,tokenVerificare,expireVerificare) VALUES(?,?,?,?,?,?,?);";
                $stmt=mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt,$mysql)) {
                  header("Location: ../register.php?error=mysqlerror&nume=".$nume."&prenume=".$prenume."&email=".$email."&confirmail=".$email_repeat);
                  exit();
                }
                  $parola=password_hash($password,PASSWORD_DEFAULT);
                  $hash=password_hash($token, PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt,"sssssss",$nume,$prenume,$email,$parola,$select,$hash,$end);
                  mysqli_stmt_execute($stmt);

                  /*  trimitere mail */

                  /*Gmail mail sender care este limitat la 100 de mail-uri pe zi*/
                  $mail=new PHPMailer\PHPMailer\PHPMailer();
                  $mail->isSMTP(true);
                  $mail->SMTPDebug = 1;
                  $mail->SMTPAuth=true;
                  $mail->SMTPSecure = 'ssl';
                  $mail->Host="ssl://smtp.gmail.com";
                  $mail->Port='465';
                  $mail->isHTML(true);
                  $mail->Username='phprobertplaiasu03@gmail.com';
                  $mail->Password='testgmail1234';
                  $mail->SetFrom('phprobertplaiasu03@gmail.com');
                  $mail->Subject='Crearea contului Stoodle';
                  $mail->Body='
                  <a href="http://localhost/Stoodle/Back-End/pages/paginainterbari.php"><p style="font-size: 2rem; font-weight: 700; font-family: "Raleway", sans-serif;">Stoodle</p></a>
                  </br>
                  <p>Bine ati venit in familia Stoodle , sper să fiți multumiți  de serviciile oferite de Stoodle in descoperirea facultatii potrivite pentru tine!
                  Daca nu dumneavoastra ati dorit sa va faceti cont puteti ignora acest mail.</p>
                  </br><p>Aici este link-ul pentru a va creea contul: <a href="'.$link.'">'.$link.'</a></p>';
                  $mail->AddAddress($email);
                  $mail->Send();



              /*trimitere mail*/



              header("Location: ../login.php?succes=register");
              exit();

    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
  else {
    header("Location: ../register.php");
    exit();
  }

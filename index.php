<?php
   require './pages/folderlogin/datacon.php';
   
   function destroyCookie($selector,$token){
       setcookie("select", "",-60*60*24*30,"/");
       setcookie("validator","",-60*60*24*30,"/");
       header('Refresh: 1; url=index.php');
       exit();
   }
   session_start();
   if (isset($_SESSION['mailUser']) || isset($_SESSION['mailGmail']))
   {
       header("Location: ./pages/homePage.php");
       exit();
   }
   elseif(isset($_COOKIE['select']) && isset($_COOKIE['validator'])){
       if(ctype_xdigit($_COOKIE['select']) && ctype_xdigit($_COOKIE['validator'])){
           $mysql='SELECT * FROM auth WHERE selector=?';
           $stmt = mysqli_stmt_init($connection);
           if (!mysqli_stmt_prepare($stmt, $mysql))
           {
               destroyCookie($_COOKIE['select'],$_COOKIE['validator']);
           }
           mysqli_stmt_bind_param($stmt, "s", $_COOKIE['select']);
           mysqli_stmt_execute($stmt);
           $check = mysqli_stmt_get_result($stmt);
           if ($valori = mysqli_fetch_assoc($check))
           {
   
               $password_verify=password_verify($_COOKIE['validator'],$valori['validator']);
               if($password_verify===true){
   
                   /*aici pun sesiunile*/
                   $mysql="SELECT * FROM users WHERE idUser=".$valori['userid'];
                   $result=mysqli_query($connection,$mysql);
                   if(mysqli_num_rows($result)!=1){
                       destroyCookie($_COOKIE['select'],$_COOKIE['validator']);
                   }
                   if($rezultat = $result->fetch_assoc()){
                       $_SESSION['mailUser']=$rezultat['mailUser'];
   
                       /*aici se termina sesiunile*/
   
                       /*aici incepe resetarea cookieurilor*/
                       $selector=bin2hex(random_bytes(24));
                       $token=bin2hex(random_bytes(64));
                       $hash=password_hash($token,PASSWORD_DEFAULT);
                       $mysql="UPDATE auth(validator,selector) VALUES (".$hash.",".$selector.")";
                       mysqli_query($connection,$mysql);
   
                       setcookie("select", $selector,$valori['data'],"/");
                       setcookie("validator",$token,$valori['data'],"/");
   
                       header("Location: ./pages/homePage.php");
                       exit();
                     }
                   else destroyCookie($_COOKIE['select'],$_COOKIE['validator']);
               }
               else  destroyCookie($_COOKIE['select'],$_COOKIE['validator']);
           }
           else destroyCookie($_COOKIE['select'],$_COOKIE['validator']);
       }
       else destroyCookie($_COOKIE['select'],$_COOKIE['validator']);
   
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Stoodle</title>
      <link rel="icon" href="logo.ico" type="image/x-icon" />
      <link rel="stylesheet" href="./pages/CSS/landing-page.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   </head>
   <body>
      <div class="alert alert-success alert-dismissible fade show hidden" role="alert">
         <strong>Speram sa ne revedem!</strong> <br>
         <hr>Te-ai deconectat cu succes.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
    <nav class="navbar navbar-expand-lg navbar-light my-5">
        <div class="container">
            <a class="navbar-brand" href="./index.php">STOODLE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="./pages/login.php">logare</a>
                    <a class="nav-item nav-link" href="./pages/register.php">inregistrare</a>
                </ul>
            </div>
        </div>
    </nav>
    <div id="intro-section">
        <div id="intro-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 id="main-title"> 
                        Dezvolta-te in viata si in cariera
                    </h1>
                    <p class="mb-5">
                    Viața ta începe în momentul în care începi să iei decizii. Decizii 
                importante care îți marchează tot <br> viitorul. Și sigur nu vrei să fie unele 
                greșite. Pentru a fi sigur că te îndrepți spre reușită, ia cele mai <br> bune 
                decizii pentru tine, în funcție de aptitudinile pe care le ai.
                    </p>
                    <a href="./pages/login.php" class="button my-5"> Incepe </a>
                </div>
            </div>
        </div>
    </div>


      <div class="cookie-container">
         <p class="p-2">
            Folosim cookie-uri pe acest site web pentru a vă oferi cea mai bună experiență pe site-ul nostru și pentru a vă afișa reclame relevante. Pentru a afla mai multe, citiți
            <a href="#">politica noastră de confidențialitate</a> și <a href="#">olitica privind cookie-urile</a>.
         </p>
         <button class="cookie-btn">
         Okay
         </button>
      </div>




















      <script>
         const cookieContainer = document.querySelector(".cookie-container");
         const cookieButton = document.querySelector(".cookie-btn");
         
         cookieButton.addEventListener("click", () => {
             cookieContainer.classList.remove("active");
             localStorage.setItem("cookieBannerDisplayed", "true");
         });
         
         setTimeout(() => {
             if (!localStorage.getItem("cookieBannerDisplayed")) {
                 cookieContainer.classList.add("active");
             }
         }, 1000);
      </script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>
         const queryString = window.location.search;
         const urlParams = new URLSearchParams(queryString);
         if(urlParams.get('logout') == "succes")
             $(".alert").removeClass("hidden");
      </script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>
</html>
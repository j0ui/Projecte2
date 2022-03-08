<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['DNI'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
}

$DNI_2 = $_SESSION['DNI'];
$query = $con -> query ("SELECT * FROM client WHERE DNI='$DNI_2'");
$valores = mysqli_fetch_array($query);
$Nom = $valores['Nom'];
$Cognom = $valores['Cognom'];
$DNI = $valores['DNI'];
$Correu = $valores['Correu'];
$Telefon = $valores['Telefon'];
?>
<!--Tenim la pàgina ordenada per header/main/footer-->
<!DOCTYPE html PUBLIC >
<html lang="ca">
<head>
<link rel="stylesheet" href="cuenta.css">
<link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://your-site-or-cdn.com/fontawesome/v5.15.4/js/all.js"></script><!--Aqui hem posat els scripts i css que utilitzem -->
<script src="cuenta.js"></script>
</head>
<body>
  <header><!--Aqui hem fet el header desplegable -->
  <input type="checkbox" id="active">
  <label for="active" class="menu-btn"><i class="fas fa-bars"></i></label>
  <div class="wrapper">
    <ul>
      <li><a href="inici.php">Inici</a></li>
      <li><a href="activitats.php">Activitats</a></li>
      <li><a href="Sala.php">Sales</a></li>
      <li><a href="calendari.php">Curses</a></li>
      <li><a href="cuenta.php">El Meu Perfil</a></li>
      <li><a href="reserves.php">Les Meves Reserves</a></li>
      <li name="logout"><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
  </header>
  <main><!--Aqui hem creat el contingut on tenim les dades de la persona i hem utilitzat php per a que apareguin i que pugui canviar alguna dada -->
  <div class="settings-page">
  <div class="settings-container">
    <h1 class="page-title">El Meu Compte</h1>
    <div class="settings-section">
      <h2 class="settings-title">Informació Personal</h2>
      <div class="non-active-form">

        <h3>Nom:</h3><p><?=$Nom?></p><button class="fas fa-pen" onclick="showNom()"></button>
      </div>
      <div>
        <form method="post" action="" name="signin-form">
          <input name="Nom" id="Nom" value="" type="text" placeholder="Canviar El Nom" class="form-control" autocomplete="Canviar el Nom" required>
        <button class="fas fa-solid fa-check" type="submit" id="Nom2" name="Nom2"></button>
        </form>
      </div>
    <div>
      <div class="non-active-form">
        <h3>Cognom:</h3><p class="capitalize"><?=$Cognom?></p><button class="fas fa-pen" onclick="showCognom()"></button>
      </div>
      <form method="post" action="" name="signin-form">
      <input name="Cognom" id="Cognom" value="" type="text" placeholder="Canviar El Cognom" class="form-control" autocomplete="Canviar el Cognom" required>
      <button class="fas fa-solid fa-check" type="submit" id="Cognom2" name="Cognom2"></button>
    </form>
    </div>
      <div>
        <div class="non-active-form">
          <h3>DNI:</h3><p class="capitalize"><?=$DNI?></p>
        </div>
      </div>
      <div>
        <div class="non-active-form">
          <h3>Telefon:</h3><p class="capitalize"><?=$Telefon?></p><button class="fas fa-pen" onclick="showTel()"></button>
        </div>
        <form method="post" action="" name="signin-form">
        <input name="Telefon" id="Telefon"  placeholder="Canviar El Telefon" type="text" class="Nom" autocomplete="Canviar el Telefon" required="" oninvalid="this.setCustomValidity('Introdueixi Un Telefon')">
        <button class="fas fa-solid fa-check" id="Telefon2" name="Telefon2">
        </form>
      </div>
      <div>
        <div class="non-active-form">
          <h3>Correu:</h3><p><?=$Correu?></p><button class="fas fa-pen" onclick="showC()"></button>
        </div>
        <form method="post" action="" name="signin-form">
        <input name="Correu" id="Correu"  placeholder="Canviar El Correu" type="text" class="Nom" autocomplete="Canviar el Correu" required="" oninvalid="this.setCustomValidity('Introdueixi Un Correu')">
        <button class="fas fa-solid fa-check" id="Correu2" name="Correu2"></button>
      </form>
      </div>
    </div>

    <div class="settings-section"><!--Aqui hem creat la opció per canviar la Contrassenya on comparem la que ell posa amb la de la base de dades i si es correcta es canvia per la que ha posat ell -->
      <h2 class="settings-title">CANVIAR CONTRASSENYA</h2>
      <form method="post" class="form my-form">
        <div class="form-group">
          <div class="input-group">
            <input name="currentPassword" placeholder="Old Password" type="password" class="form-control" autocomplete="Antiga Contrassenya" value="" required>
            <span class="focus-input"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input name="password" placeholder="New Password" type="password" class="form-control" autocomplete="Nova Contrassenya" value="" required>
            <span class="focus-input"></span>
          </div>
        </div>
        <div class="form-submit right">
          <input class="buttons" type="submit" name="contra" value="Canviar Contrassenya">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
//Aqui hem creat les variables les cuals serveixen per a que canvii el nom de la base de dades per el que ha posat el client
$be = 0;
$DNI_2 = $_SESSION['DNI'];
$query = $con -> query ("SELECT * FROM client WHERE DNI='$DNI_2'");
$valores = mysqli_fetch_array($query);
$Nom = $valores['Nom'];
$Cognom = $valores['Cognom'];
$DNI = $valores['DNI'];
$Correu = $valores['Correu'];
$Telefon = $valores['Telefon'];
$Contra3 = $valores['Contrassenya'];
if (isset($_POST['Nom2'])) {
$Nom2 =  mysqli_real_escape_string($con,$_POST['Nom']);
$sql2 = "UPDATE `client` SET
    `Nom` = '$Nom2'
 where `DNI` = '$DNI_2'";
 if(mysqli_query($con, $sql2)){
   $be = 1;
 }else{
   $be = 2;
 }
}
if (isset($_POST['Cognom2'])) {
$Cognom2 =  mysqli_real_escape_string($con,$_POST['Cognom']);
$sql2 = "UPDATE `client` SET
    `Cognom` = '$Cognom2'
 where `DNI` = '$DNI_2'";
 if(mysqli_query($con, $sql2)){
   $be = 1;
 }else{
   $be = 2;
 }
}


if (isset($_POST['Correu2'])) {
$Correu2 =  mysqli_real_escape_string($con,$_POST['Correu']);
function validateEmail($Correu2) {
    if(filter_var($Correu2, FILTER_VALIDATE_EMAIL)) {
      $sql2 = "UPDATE `client` SET
        `Correu` = '$Correu2'
          where `DNI` = '$DNI_2'";
            if(mysqli_query($con, $sql2)){
                $be = 1;
                }else{
                    $be = 2;
                    }
              }else{
                $be = 4;
              }
}}
if (isset($_POST['Telefon2'])) {
$pattern = '/^([0-9]{9})$/';
$Telefon2 =  mysqli_real_escape_string($con,$_POST['Telefon']);
  if((preg_match($pattern, $Telefon2))) {
    $sql2 = "UPDATE `client` SET
          `Telefon` = '$Telefon2'
          where `DNI` = '$DNI_2'";
          if(mysqli_query($con, $sql2)){
            $be = 1;
          }else{
            $be = 2;
          }
    }else{
      $be = 3;
    }
}
if (isset($_POST['contra'])) {
$Contra =  mysqli_real_escape_string($con,md5($_POST['currentPassword']));
  if($Contra==$Contra3){
    $Contra2 =  mysqli_real_escape_string($con,md5($_POST['password']));
    $sql2 = "UPDATE `client` SET
      `Contrassenya` = '$Contra2'
      where `DNI` = '$DNI_2'";
      if(mysqli_query($con, $sql2)){
        $be = 6;
      }else{
        $be = 2;
      }
  }else{
    $be = 5;
  }
}
//Aqui hem creat aixo el cual son els missatges que apareixen si el canvi s'ha realitzat correctament o incorrectament
if($be==1){
  ECHO <<<EOF
  <div id="container">
  <div id="success-box">
  <div class="dot"></div>
  <div class="dot two"></div>
  <div class="face">
  <div class="eye"></div>
  <div class="eye right"></div>
  <div class="mouth happy"></div>
  </div>
  <div class="shadow scale"></div>
  <div class="message"><h1 class="alert">Canvi Realitzat!</h1><p>S'ha actualitzat el teu perfil.</p></div>
  <button class="button-box" onclick="location.href='cuenta.php'"><h1 class="green">Continuar</h1></button>
  </div>
  EOF;
}else if($be==2){

  ECHO <<<EOF
  <div id="container">
  <div id="error-box">
  <div class="dot"></div>
  <div class="dot two"></div>
  <div class="face2">
  <div class="eye"></div>
  <div class="eye right"></div>
  <div class="mouth sad"></div>
  </div>
  <div class="shadow move"></div>
  <div class="message"><h1 class="alert">Error!</h1><p>No s'ha pogut fer el canvi</div>
  <button class="button-box" onclick="location.href='cuenta.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;

}else if($be==3){

  ECHO <<<EOF
  <div id="container">
  <div id="error-box">
  <div class="dot"></div>
  <div class="dot two"></div>
  <div class="face2">
  <div class="eye"></div>
  <div class="eye right"></div>
  <div class="mouth sad"></div>
  </div>
  <div class="shadow move"></div>
  <div class="message"><h1 class="alert">Error!</h1><p>El telefon no es vàlid</div>
  <button class="button-box" onclick="location.href='cuenta.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;

}
else if($be==4){

  ECHO <<<EOF

  <div id="error-box">
  <div class="dot"></div>
  <div class="dot two"></div>
  <div class="face2">
  <div class="eye"></div>
  <div class="eye right"></div>
  <div class="mouth sad"></div>
  </div>
  <div class="shadow move"></div>
  <div class="message"><h1 class="alert">Error!</h1><p>El Correu No es Vàlid</div>
  <button class="button-box" onclick="location.href='cuenta.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;

}
else if($be==5){

  ECHO <<<EOF
  <div id="container">
  <div id="error-box">
  <div class="dot"></div>
  <div class="dot two"></div>
  <div class="face2">
  <div class="eye"></div>
  <div class="eye right"></div>
  <div class="mouth sad"></div>
  </div>
  <div class="shadow move"></div>
  <div class="message"><h1 class="alert">Error!</h1><p>Contrassenya Actual No Vàlida</div>
  <button class="button-box" onclick="location.href='cuenta.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;

}else if($be==6){
  ECHO <<<EOF
  <div id="container">
  <div id="success-box">
  <div class="dot"></div>
  <div class="dot two"></div>
  <div class="face">
  <div class="eye"></div>
  <div class="eye right"></div>
  <div class="mouth happy"></div>
  </div>
  <div class="shadow scale"></div>
  <div class="message"><h1 class="alert">Canvi Realitzat!</h1><p>S'ha actualitzat la Contrassenya.</p></div>
  <button class="button-box" onclick="location.href='index.php'"><h1 class="green">Continuar</h1></button>
  </div>
  EOF;

}
?>
</main>
<!--Aqui hem creat el footer el cual l'hem dividit amb bastantes classes per a poder fer millors modificacions-->
<footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Troba'ns</h4>
                                <span>Carrer Barcelona, Guissona</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Truca'ns</h4>
                                <span>685412523</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Envia'ns un Correu</h4>
                                <span>GymBros@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subsciu-te</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>No et perdis novetats del Gimnàs.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright © 2022 GymBros, Inc.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="inici.php">Inici</a></li>
                                <li><a href="#">Termins i Condicions</a></li>
                                <li><a href="#">Privacitat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

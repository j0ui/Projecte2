<!--Those data are setting for checking data existance in the database -->
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
?>
<!DOCTYPE html PUBLIC >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>


  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
<link rel="stylesheet" href="reserves.css">
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link per una pagina de icones, per posar les logos de xarxes al footer -->
<link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <div class="titol">
    <h1 class="titol2">LES MEVES RESERVES</h1>
  </div>
  <input type="checkbox" id="active">
  <label for="active" class="menu-btn"><i class="fas fa-bars"></i></label>
  <div class="wrapper">
    <ul>
      <li><a href="inici.php">Inici</a></li>
      <li><a href="header.php">Activitats</a></li>
      <li><a href="#">Sales</a></li>
      <li><a href="#">Curses</a></li>
      <li><a href="cuenta.php">El Meu Perfil</a></li>
      <li><a href="reserves.php">Les Meves Reserves</a></li>
      <li name="logout"><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
<div class="activitats2">
<?php

$anular = 1;

if(isset($_POST['anular'])){
  $anular = 1;
}
if(isset($_POST['anular2'])){
  $anular = 2;
}
if(isset($_POST['anular3'])){
  $anular = 3;
}
if(isset($_POST['anular4'])){
  $anular = 4;
}
if(isset($_POST['anular5'])){
  $anular = 5;
}
if(isset($_POST['anular6'])){
  $anular = 6;
}
if(isset($_POST['anular7'])){
  $anular = 7;
}
if(isset($_POST['anular8'])){
  $anular = 8;
}
if(isset($_POST['anular9'])){
  $anular = 9;
}
if(isset($_POST['anular10'])){
  $anular = 10;
}
if(isset($_POST['anular11'])){
  $anular = 11;
}
if(isset($_POST['anular12'])){
  $anular = 12;
}
$be = 0;
$DNI_2 = $_SESSION['DNI'];
if(isset($_POST['anular'])  || isset($_POST['anular2'])  || isset($_POST['anular3'])  || isset($_POST['anular4'])  || isset($_POST['anular5'])  || isset($_POST['anular6'])  || isset($_POST['anular7'])
|| isset($_POST['anular8'])  || isset($_POST['anular9'])  || isset($_POST['anular10'])  || isset($_POST['anular11'])  || isset($_POST['anular12'])) {
  echo $anular;
   $sql2 = "UPDATE activitat SET Reserves = Reserves - 1 WHERE ID_Activitat = '$anular'";
   mysqli_query($con, $sql2);
   $query = $con -> query ("SELECT * FROM activitat WHERE ID_Activitat = '$anular' AND (NOW() + INTERVAL 1 HOUR)<h_inici AND (NOW() + INTERVAL 24 HOUR)>h_inici");
   $valores = mysqli_fetch_array($query);
   $h_inici = $valores['h_inici'];
     $sql = "DELETE from reserves where DNI = '$DNI_2' AND ID_Activitat = '$anular' AND h_inici = '$h_inici'";
     if(mysqli_query($con, $sql)){
     $be = 7;
   }else{
     $be = 3;
   }
}
$query = $con -> query ("SELECT * FROM activitat a, sala s, monitor m, client cl, reserves res WHERE cl.DNI=res.DNI AND res.ID_Activitat=a.ID_Activitat AND s.ID=a.ID_s AND m.ID=s.ID AND (NOW() + INTERVAL 1 HOUR)<a.h_inici
AND (NOW() + INTERVAL 24 HOUR)>a.h_inici AND res.h_inici=a.h_inici AND cl.DNI='$DNI_2'");
$valores = mysqli_fetch_array($query);
if($valores!=null){
$ID_a3 = $valores['ID_Activitat'];
$h_inici = $valores['h_inici'];
$h_fi = $valores['h_fi'];
$Dat2 = $valores['Data_fisica'];
$ID_s = $valores['ID_s'];
$Desc = $valores['Descripció'];
$Act_nom = $valores['Act_nom'];
$color = null;
foreach($query as $row){


  if($row['Act_nom']=="Bici"){
    $color = "green";
  }elseif($row['Act_nom']=="Padel"){
    $color = "yellow";
  }elseif($row['Act_nom']=="Piscina"){
    $color = "blue";
  }elseif($row['Act_nom']=="Fitness"){
    $color = "red";
  }elseif($row['Act_nom']=="Cycling"){
    $color = "white";
  }elseif($row['Act_nom']=="Body_Pump"){
    $color = "purple";
  }elseif($row['Act_nom']=="CintadeCorrer"){
    $color = "brown";
  }elseif($row['Act_nom']=="Pilates"){
    $color = "pink";
  }elseif($row['Act_nom']=="Natacio"){
    $color = "orange";
  }elseif($row['Act_nom']=="Aquagym"){
    $color = "cyan";
  }elseif($row['Act_nom']=="Running"){
    $color = "grey";
  }elseif($row['Act_nom']=="Zumba"){
    $color = "maroon";
  }

  $anular = 1;

  if(isset($_POST['anular'])){
    $anular = 1;
  }
  if(isset($_POST['anular2'])){
    $anular = 2;
  }
  if(isset($_POST['anular3'])){
    $anular = 3;
  }
  if(isset($_POST['anular4'])){
    $anular = 4;
  }
  if(isset($_POST['anular5'])){
    $anular = 5;
  }
  if(isset($_POST['anular6'])){
    $anular = 6;
  }
  if(isset($_POST['anular7'])){
    $anular = 7;
  }
  if(isset($_POST['anular8'])){
    $anular = 8;
  }
  if(isset($_POST['anular9'])){
    $anular = 9;
  }
  if(isset($_POST['anular10'])){
    $anular = 10;
  }
  if(isset($_POST['anular11'])){
    $anular = 11;
  }
  if(isset($_POST['anular12'])){
    $anular = 12;
  }

ECHO <<< EOF

<div class="container">
<div class="card" id="$color"><p class="actn">$row[Act_nom]</p>
<div class="imgBx">
<img src="imatges/$row[img]">
</div>
<div class="contentBx">
<h2>$row[Act_nom]</h2>
<div class="monitor">
<h3>Monitor:</h3>
$row[Nom_m] $row[Cognom_m]
</div>
<div class="hora">
<h3>Hora Inici:</h3>
$row[h_inici]
</div>
<div class="fi">
<h3>Aforament:</h3>
$row[Reserves]/$row[Aforament]
</div>
<div class="sala">
<h3>Sala :</h3>
$row[ID_s]
</div>
<div class="desc">
<h3></h3>
$row[Descripció]
</div>
<form method="post">
EOF;

$count7 = $con -> query ("SELECT res.* FROM reserves res, activitat a WHERE res.DNI = '$DNI_2' AND res.ID_Activitat = '$row[ID_Activitat]'  AND res.h_inici=a.h_inici");
$exists7 = (mysqli_num_rows($count7))?TRUE:FALSE;








if($row['ID_Activitat']==1 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if(($row['ID_Activitat']==2) && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button2" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==3 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button3" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==4 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button4" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==5 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button5" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==6 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button6" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==7 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button7" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==8 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button8" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==9 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button9" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==10 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button10" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==11 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button11" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==12 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button12" value="&#8986; Reservar"><span>Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==1 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==2 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular2" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==3 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular3" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==4 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular4" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==5 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular5" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==6 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular6" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==7 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular7" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==8 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular8" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==9 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular9" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==10 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular10" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==11 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular11" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
if($row['ID_Activitat']==12 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular12" value="&#8986; Reservar"><span>Anular</span></button>
EOF;
}
ECHO <<< EOF
</form>
</div>
</div>
</div>
EOF;
}
}else{
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
  <div class="message"><h1 class="alert">Error!</h1><p>No tens cap reserva Actualmentt</div>
  <button class="button-box" onclick="location.href='reserves.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;
}
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
  <div class="message"><h1 class="alert">Success!</h1><p>T'has donat de baixa de l'activitat.</p></div>
  <button class="button-box" onclick="location.href='reserves.php'"><h1 class="green">Continuar</h1></button>
  </div>
  EOF;
}

 ?>
</div>

<footer class="footer-section">
        <div class="container2">
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
                                    <button class="footer2"><i class="fab fa-telegram-plane"></i></button>
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

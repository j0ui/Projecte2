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
<!--Aquesta pàgina tambe l'hem ordenat per header/main/footer encara que el contingut esta dins el php ja que aixi es mes facil treballar i inserir dades de php dins html -->
<html lang="ca">
<head>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
<link rel="stylesheet" href="activitats.css">
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link per una pagina de icones, per posar les logos de xarxes al footer -->
<link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
<script src="https://kit.fontawesome.com/a076d05399.js"></script><!--Hem afegit els css i script que hem utilitzat -->
</head>
<body>
  <header>
  <div class="titol">
    <h1 class="titol2">ACTIVITATS DISPONIBLES</h1>
  </div>
  <input type="checkbox" id="active"><!--Aqui hem fet el desplegable -->
  <label for="active" class="menu-btn"><i class="fas fa-bars"></i></label>
  <div class="wrapper">
    <ul>
      <li><a href="inici.php">Inici</a></li>
      <li><a href="activitats.php">Activitats</a></li>
      <li><a href="Sala.php">Sales</a></li>
      <li><a href="#">Curses</a></li>
      <li><a href="cuenta.php">El Meu Perfil</a></li>
      <li><a href="reserves.php">Les Meves Reserves</a></li>
      <li name="logout"><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
  </header>

<div class="activitats2">
<?php
//Aqui hem assignat al num el valor 1 per defecte, el num ens servira per identificar la id de activitat depenen de quin boto toquem
$num = 1;
if(isset($_POST['bier-button'])){
  $num = 1;
}
if(isset($_POST['bier-button2'])){
  $num = 2;
}
if(isset($_POST['bier-button3'])){
  $num = 3;
}
if(isset($_POST['bier-button4'])){
  $num = 4;
}
if(isset($_POST['bier-button5'])){
  $num = 5;
}
if(isset($_POST['bier-button6'])){
  $num = 6;
}
if(isset($_POST['bier-button7'])){
  $num = 7;
}
if(isset($_POST['bier-button8'])){
  $num = 8;
}
if(isset($_POST['bier-button9'])){
  $num = 9;
}
if(isset($_POST['bier-button10'])){
  $num = 10;
}
if(isset($_POST['bier-button11'])){
  $num = 11;
}
if(isset($_POST['bier-button12'])){
  $num = 12;
}
//em fet el mateix per anular el cual fara el mateix pero pel botó de anular una activitat
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
$DNI_2 = $_SESSION['DNI'];//em dit que DNI_2 sera el DNI que te el client el cual es registra a la pagina de LOGIN
//Aqui hem dit que si toca algun del botons de anular l'activitat amb el valor que te anular s'anularà (DELETE)
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
//Aqui hem creat algunes variables que despres hem utilitzat per comparar
$date = date('Y-m-d');
$hora = date("Y-m-d", strtotime('+1day'));
$hora2 = date("Y-m-d H:i:s", strtotime('+24 hours'));
$query2 = $con -> query ("SELECT * FROM activitat WHERE ID_Activitat= $num" );
$valores2 = mysqli_fetch_array($query2);
$ID_a2 = $valores2['ID_Activitat'];
$h_inici2 = $valores2['h_inici'];
$h_fi2 = $valores2['h_fi'];
$Dat2 = $valores2['Data_fisica'];
$ID_s = $valores2['ID_s'];
$error = "Ja has reservat aquesta activitat";
$bona = "S'ha reservat amb exit";
$query5 = $con -> query ("SELECT * FROM sala WHERE ID= $ID_s" );
$valores5 = mysqli_fetch_array($query5);
$ID_s3 = $valores5['ID'];
$aforament = $valores5['Aforament'];
$Descripcio = $valores5['Descripcio'];
//Aqui hem creat més variables que ens serveixen per comprobar que l'activitat te menys aforament del permes o si existeix o comprobar
//el interval o per comprobar si es individual o colectiva i que sol pugui reservar una  de cada per dia
$count7 = $con -> query ("SELECT * FROM activitat WHERE `ID_Activitat`= '$num' AND `ID_s`=$ID_s3 AND `Reserves`+1<='$aforament'");
$exists3 = (mysqli_num_rows($count7))?TRUE:FALSE;
  if($exists3==null && (isset($_POST['bier-button2']) || isset($_POST['bier-button']) || isset($_POST['bier-button3']) || isset($_POST['bier-button4']) || isset($_POST['bier-button5']) || isset($_POST['bier-button6'])  ||  isset($_POST['bier-button7'])
      ||  isset($_POST['bier-button8'])  ||  isset($_POST['bier-button9'])  ||  isset($_POST['bier-button10'])  ||  isset($_POST['bier-button11'])  ||  isset($_POST['bier-button12']))){
        $be = 4;
      }

$query = $con -> query ("SELECT * FROM activitat WHERE (NOW() + INTERVAL 1 HOUR)<h_inici AND (NOW() + INTERVAL 24 HOUR)>h_inici");
$valores = mysqli_fetch_array($query);
foreach($query as $row){

$count7 = $con -> query ("SELECT * FROM reserves WHERE `DNI` = '$DNI_2' AND ID_Activitat = '$row[ID_Activitat]' AND (NOW() + INTERVAL 1 HOUR)<h_inici AND (NOW() + INTERVAL 24 HOUR)>h_inici");
$exists7 = (mysqli_num_rows($count7))?TRUE:FALSE;
  if($exists7!=null ){
  }
}

$count6 = $con -> query ("SELECT * FROM activitat WHERE `ID_Activitat`= '$num' AND (NOW() + INTERVAL 1 HOUR)<h_inici AND (NOW() + INTERVAL 24 HOUR)>h_inici");
$exists2 = (mysqli_num_rows($count6))?TRUE:FALSE;
if($exists2==null && (isset($_POST['bier-button2']) || isset($_POST['bier-button']) || isset($_POST['bier-button3']) || isset($_POST['bier-button4']) || isset($_POST['bier-button5']) || isset($_POST['bier-button6'])  ||  isset($_POST['bier-button7'])
 ||  isset($_POST['bier-button8'])  ||  isset($_POST['bier-button9'])  ||  isset($_POST['bier-button10'])  ||  isset($_POST['bier-button11'])  ||  isset($_POST['bier-button12']))){

  $be = 3;
}


$count6 = $con -> query ("SELECT res.* FROM reserves res, activitat_individual i, activitat a WHERE i.ID_Activitat=a.ID_Activitat AND res.ID_Activitat=a.ID_Activitat AND res.DNI = '$DNI_2' AND res.h_inici=a.h_inici AND (NOW() + INTERVAL 1 HOUR)<res.h_inici AND (NOW() + INTERVAL 24 HOUR)>res.h_inici");
$exists6 = (mysqli_num_rows($count6))?TRUE:FALSE;
if($exists6!=null && (isset($_POST['bier-button2']) || isset($_POST['bier-button']) || isset($_POST['bier-button3']) || isset($_POST['bier-button4']) || isset($_POST['bier-button7']))){
  $be = 9;
}

$count8 = $con -> query ("SELECT res.* FROM reserves res, activitat_colectiva c, activitat a WHERE c.ID_Activitat=a.ID_Activitat AND res.ID_Activitat=a.ID_Activitat AND res.DNI = '$DNI_2' AND res.h_inici=a.h_inici AND (NOW() + INTERVAL 1 HOUR)<res.h_inici AND (NOW() + INTERVAL 24 HOUR)>res.h_inici");
$exists8 = (mysqli_num_rows($count8))?TRUE:FALSE;
if($exists8!=null && (isset($_POST['bier-button5']) || isset($_POST['bier-button6']) || isset($_POST['bier-button9']) || isset($_POST['bier-button8']) || isset($_POST['bier-button10']) || isset($_POST['bier-button11']) || isset($_POST['bier-button12']))){
  $be = 8;
}



$count2= $con -> query ("SELECT * FROM reserves where `DNI` = '$DNI_2' AND `ID_Activitat`>= $num");
$valores3 = mysqli_fetch_array($count2);
if($valores3!=null){
$Data = $valores3['Dat_fisica'];
$ID_a3 = $valores3['ID_Activitat'];
$h_i2 = $valores3['h_inici'];
$h_f2 = $valores3['h_fi'];
}
//Aqui hem creat la opcio per les activitats individuals i comprobem les valors anteriors, si existeix, si ja s'ha reservat una individual abans o no...
  if((isset($_POST['bier-button2']) || isset($_POST['bier-button']) || isset($_POST['bier-button3']) || isset($_POST['bier-button4']) || isset($_POST['bier-button7'])) && $exists2!=null && $exists3!=null && $exists6==null) {
    $sql = "UPDATE activitat SET Reserves = Reserves + 1 WHERE ID_Activitat = '$num'";
   mysqli_query($con, $sql);
   $DNI_1 = $_SESSION['DNI'];
   $query = $con -> query ("SELECT * FROM activitat WHERE ID_Activitat= '$num'");
   $valores = mysqli_fetch_array($query);
   $ID_a = $valores['ID_Activitat'];
   $h_inici = $valores['h_inici'];
   $h_fi = $valores['h_fi'];
   $Dat = $valores['Data_fisica'];

   $sql2 = "INSERT INTO reserves (DNI, ID_Activitat, h_inici, h_fi, Dat_fisica) VALUES ('$DNI_1', '$ID_a', '$h_inici', '$h_fi', '$Dat')";
    mysqli_query($con, $sql2)or die(mysql_error());
    $be = 1;
}
//Aqui hem creat la opcio per les activitats colectives i comprobem les valors anteriors, si existeix, si ja s'ha reservat una colectiva abans o no...
  if((isset($_POST['bier-button5']) || isset($_POST['bier-button6']) || isset($_POST['bier-button9']) || isset($_POST['bier-button8']) || isset($_POST['bier-button10']) || isset($_POST['bier-button11']) || isset($_POST['bier-button12'])) && $exists2!=null && $exists3!=null && $exists8==null) {
      $sql = "UPDATE activitat SET Reserves = Reserves + 1 WHERE ID_Activitat = '$num'";
      mysqli_query($con, $sql);
      $DNI_1 = $_SESSION['DNI'];
      $query = $con -> query ("SELECT * FROM activitat WHERE ID_Activitat= '$num'");
      $valores = mysqli_fetch_array($query);
      $ID_a = $valores['ID_Activitat'];
      $h_inici = $valores['h_inici'];
      $h_fi = $valores['h_fi'];
      $Dat = $valores['Data_fisica'];

      $sql2 = "INSERT INTO reserves (DNI, ID_Activitat, h_inici, h_fi, Dat_fisica) VALUES ('$DNI_1', '$ID_a', '$h_inici', '$h_fi', '$Dat')";
      mysqli_query($con, $sql2)or die(mysql_error());
      $be = 1;
    }
//el select que ens mostra les activitats entre 1 i 24 hores
$query = $con -> query ("SELECT * FROM activitat a, sala s, monitor m WHERE s.ID=a.ID_s AND m.ID=s.ID AND (NOW() + INTERVAL 1 HOUR)<a.h_inici AND (NOW() + INTERVAL 24 HOUR)>a.h_inici");
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
//Aqui es on hem afegit el codi html dins php apart de mes variables creader
foreach($query as $row){

//aqui hem fet que el color sigui un o un altre depenen del nom de la activitat
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
//Aqui esta el text que s'imprimirà de les activitats entre 1 i 24 hores
if($row['ID_Activitat']==1 ||$row['ID_Activitat']==2 ||$row['ID_Activitat']==3 ||$row['ID_Activitat']==4 || $row['ID_Activitat']==7){
  $tipus = 'Individual';
}else{
  $tipus = 'Colectiva';
}
ECHO <<< EOF

<div class="container">
<div class="card" id="$color"><p class="actn">$row[Act_nom]</p>
<div class="imgBx">
<img src="imatges/$row[img]" alt="$row[img]">
</div>
<div class="contentBx">
<h2>$row[Act_nom] / $tipus</h2>
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

$query2 = $con -> query ("SELECT * FROM activitat a, sala s, monitor m, client cl, reserves res WHERE cl.DNI=res.DNI AND res.ID_Activitat=a.ID_Activitat AND s.ID=a.ID_s AND m.ID=s.ID AND (NOW() + INTERVAL 1 HOUR)<a.h_inici
AND (NOW() + INTERVAL 24 HOUR)>a.h_inici AND a.h_inici=res.h_inici AND cl.DNI='$DNI_2' AND res.ID_Activitat = '$row[ID_Activitat]'");
$exists7 = (mysqli_num_rows($query2))?TRUE:FALSE;






//utilitztem el exists7 per que apareixi el boto de reservar o anular depenen del select

if($row['ID_Activitat']==1 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button" value="&#8986; Reservar"><span>&#128690; Reservar</span></button>
EOF;
}
if(($row['ID_Activitat']==2) && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button2" value="&#8986; Reservar"><span>&#127934; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==3 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button3" value="&#8986; Reservar"><span>&#127946; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==4 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button4" value="&#8986; Reservar"><span>&#128170; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==5 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button5" value="&#8986; Reservar"><span>&#128692; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==6 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button6" value="&#8986; Reservar"><span>&#127947; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==7 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button7" value="&#8986; Reservar"><span>&#127996; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==8 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button8" value="&#8986; Reservar"><span>&#129336; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==9 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button9" value="&#8986; Reservar"><span>&#127946; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==10 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button10" value="&#8986; Reservar"><span>&#129341; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==11 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button11" value="&#8986; Reservar"><span>&#127996; Reservar</span></button>
EOF;
}
if($row['ID_Activitat']==12 && $exists7==null){
ECHO <<< EOF
<button type="submit" name="bier-button12" value="&#8986; Reservar"><span>&#128131;Reservar&#128378;</span></button>
EOF;
}

//Aqui diem que si no es null ens apareixi el boto de Anular i que tambe agafi la ID de la activitat
if($row['ID_Activitat']==1 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==2 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular2" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==3 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular3" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==4 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular4" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==5 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular5" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==6 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular6" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==7 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular7" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==8 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular8" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==9 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular9" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==10 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular10" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==11 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular11" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
if($row['ID_Activitat']==12 && $exists7!=null){
ECHO <<< EOF
<button type="submit" name="anular12" value="&#8986; Reservar"><span>&#10060; Anular</span></button>
EOF;
}
ECHO <<< EOF
</form>
</div>
</div>
</div>
EOF;
}
}else{//Si no hi ha cap activitat ens apareixerà aquest missatge
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
  <div class="message"><h1 class="alert">Error!</h1><p>No hi ha cap activitat per Reservar actualment</div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;
}//Aqui tenim els missatges de notificació
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
  <div class="message"><h1 class="alert">Èxit!</h1><p>T'has registrat per a la activitat.</p></div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="green">Continuar</h1></button>
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
  <div class="message"><h1 class="alert">Error!</h1><p>Ja tens una reserva activa per aquesta activitat</div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="red">SORTIR</h1></button>
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
  <div class="message"><h1 class="alert">Error!</h1><p>Ja no pots reservar aquesta activitat</div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;

}
else if($be==4){
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
  <div class="message"><h1 class="alert">Error!</h1><p>Aformaent Complet</div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;

}elseif($be==7){
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
  <div class="message"><h1 class="alert">Èxit!</h1><p>S'ha anulat l'activitat</p></div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="green">Continuar</h1></button>
  </div>
  EOF;
}
elseif($be==8){
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
  <div class="message"><h1 class="alert">Error!</h1><p>No Pots Reservar Mes d'una Activitat Colectiva per Dia</div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;
}
elseif($be==9){
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
  <div class="message"><h1 class="alert">Error!</h1><p>No Pots Reservar Mes d'una Activitat Individual per Dia</div>
  <button class="button-box" onclick="location.href='activitats.php'"><h1 class="red">SORTIR</h1></button>
  </div>
  </div>
  EOF;
}

?>
<!--Aqui hem creat l'altra part on apareixeran les activitats disponibles mes endavant encara que no podrem reservar-->
</div>
<div class="titol3">
<h1>ACTIVITATS DISPONIBLES MES ENDAVANT</h1>
</div>
<div class="activitats3">
<?php
$query3 = $con -> query ("SELECT * FROM activitat a, sala s, monitor m WHERE s.ID=a.ID_s AND m.ID=s.ID AND a.Data_fisica > '$hora'");
$valores3 = mysqli_fetch_array($query3);
if($valores3!=null){
$color = null;
foreach($query3 as $row){
//Aqui es on hem afegit el codi html dins php apart de mes variables creader
//aqui hem fet que el color sigui un o un altre depenen del nom de la activitat
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

  //Aqui esta el text que s'imprimirà de les activitats que estaran disponibles mes endavant

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
<form>

</form>
</div>
</div>
</div>
EOF;
}
}

 ?>
</div>
</main>
<!--Aqui hem creat el footer igual que el que tenim a totes les pàgines-->
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

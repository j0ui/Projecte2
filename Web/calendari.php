<?php
// Set your timezone

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

date_default_timezone_set('Europe/Madrid');
$be = 0;
$DNI_2 = $_SESSION['DNI'];
$ID2 = 0;
$hora2 = date("Y-m-d H:i:s");
if(isset($_POST['1'])){
   $ID2 = 1;
}
if(isset($_POST['2'])){
   $ID2 = 2;
}
if(isset($_POST['3'])){
   $ID2 = 3;
}
if(isset($_POST['4'])){
   $ID2 = 4;
}
if(isset($_POST['5'])){
   $ID2 = 5;
}
if(isset($_POST['6'])){
   $ID2 = 6;
}

$count6 = $con -> query ("SELECT * FROM participa WHERE ID_Cursa= '$ID2' AND DNI = '$DNI_2'");
$exists2 = (mysqli_num_rows($count6))?TRUE:FALSE;
if($exists2!=null && (isset($_POST['1']) || isset($_POST['2']) || isset($_POST['3']) || isset($_POST['4']) || isset($_POST['5']) || isset($_POST['6']))){
  $be = 2;
}
if((isset($_POST['1']) || isset($_POST['2']) || isset($_POST['3']) || isset($_POST['4']) || isset($_POST['5']) || isset($_POST['6'])) && $exists2==null){
   $sql2 = "INSERT INTO participa (DNI, ID_Cursa, registre) VALUES ('$DNI_2', '$ID2', '$hora2')";
   if(mysqli_query($con, $sql2)){
     $be = 1;
   }else{
     $be = 2;
   }
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
<div class="message"><h1 class="alert">Èxit!</h1><p>T'has registrat per a la cursa.</p></div>
<button class="button-box" onclick="location.href='calendari.php'"><h1 class="green">Continuar</h1></button>
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
<div class="message"><h1 class="alert">Error!</h1><p>Ja tens una reserva per aquesta cursa</div>
<button class="button-box" onclick="location.href='calendari.php'"><h1 class="red">SORTIR</h1></button>
</div>
</div>
EOF;}
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / m', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    $query = $con -> query ("SELECT * FROM cursa WHERE Hora='$date'");
    $valores = mysqli_fetch_array($query);
    if($valores!=null){
    $be = 0;
    $hora = $valores['Hora'];
    $nom = $valores['Nom'];
    $id = $valores['ID_Cursa'];
    foreach($query as $row){
    if ($hora == $date){
      $DNI_2 = $_SESSION['DNI'];
      $count2= $con -> query ("SELECT * FROM client where `DNI` = '$DNI_2'");
        $week .='<td class="cursa">' . $day . '<br />'. $nom . '<br/><form method="post"><button class="button" type="submit" name="'.$row['ID_Cursa'].'" value="&#8986; Reservar">&#8986; Reservar</button></form>';


      }
    }
}


    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else if ($today != $date && $valores==null){

        $week .= '<td>' . $day;

    }
    $week .= '</td>';

    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Calendar</title>
    <link rel="stylesheet" href="calendari.css">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link per una pagina de icones, per posar les logos de xarxes al footer -->
    <link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="sala.js"></script>
    <style>
        .container {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }
        h3 {
            margin-bottom: 30px;
        }
        th {
            height: 30px;
            text-align: center;
        }
        td {
            height: 100px;
        }
        .today {
            background: orange;
        }

        .cursa {
            background: green;
            width: 170px;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
    </style>
</head>
<input type="checkbox" id="active"><!--Aqui hem fet el desplegable -->
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
<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
        <table class="table table-bordered">
            <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
    </div>
</body>
</html>

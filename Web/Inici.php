<!DOCTYPE html>

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
<html lang="ca">

    <head>
      <meta charset="UTF-8" />
        <title>Pagina inici</title>
        <link rel="stylesheet" href="Pr1_estil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Links per utilitzar els fonts de google -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link per una pagina de icones, per posar les logos de xarxes al footer -->
        <link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

      </head>

      <body>
   <input type="checkbox" id="active">
   <label for="active" class="menu-btn"><i class="fas fa-bars"></i></label>
   <div class="wrapper">
     <ul>
       <li><a href="inici.php">Inici</a></li>
       <li><a href="header.php">Activitats</a></li>
       <li><a href="error404.html">Sales</a></li>
       <li><a href="error404.html">Curses</a></li>
       <li><a href="cuenta.php">El Meu Perfil</a></li>
       <li><a href="reserves.php">Les Meves Reserves</a></li>
       <li name="logout"><a href="logout.php">Log Out</a></li>
     </ul>
   </div>
   <div class="untitled">
 	<div class="untitled__slides">
 		<div class="untitled__slide">
 			<div class="untitled__slideBg"></div>
 			<div class="untitled__slideContent">
 				<span>Les</span>
 				<span>Activitats</span>
 				<a class="button" href="header.php" target="/black">Reservar Activitats</a>
 			</div>
 		</div>
 		<div class="untitled__slide">
 			<div class="untitled__slideBg"></div>
 			<div class="untitled__slideContent">

 				<span>Les Nostres</span>
 				<span>Sales</span>
 				<a class="button" href="sales.php" target="/black">Veure les Sales</a>
 			</div>
 		</div>
 		<div class="untitled__slide">
 			<div class="untitled__slideBg"></div>
 			<div class="untitled__slideContent">
 				<span>Curses</span>
 				<span>Del trimestre</span>
 				<a class="button" href="curses.php" target="/black">Veure Les Curses</a>
 			</div>
 		</div>
 		<div class="untitled__slide">
 			<div class="untitled__slideBg"></div>
 			<div class="untitled__slideContent">
 				<span>El meu</span>
 				<span>Espai Personal</span>
 				<a class="button" href="cuenta.php" target="/black">Veure Perfil</a>
 			</div>
 		</div>
 	</div>
 	<div class="untitled__shutters"></div>
 </div>
</body>
</html>

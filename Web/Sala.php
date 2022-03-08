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
<link rel="stylesheet" href="Sala.css">
<link rel="icon" href="logo.png">
<link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link per una pagina de icones, per posar les logos de xarxes al footer -->
<link rel="stylesheet" href="http://wicky.nillia.ms/headroom.js/">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="sala.js"></script>
</head>
<body>
  <header>
    <span class="siteTitle">LES NOSTRES SALES<span>
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

  <main>
    <div class="card">
        <div class="inner">
          <h1 class="title">SALA 1</h1>
          <h3 class="subtitle">La sala 1 compta amb un gran espai per a poder realitzar qualsevol tipus d'activitat</h3>
          <h3 class="subtitle">Monitora: Carme Hernandez</h3>
          <button class="button" type="submit" name="" value="&#8986; Reservar" onclick="window.location.href='activitats.php'">&#8986; Reservar</button>
        </div>
    </div>

    <div href="#" class="card card2">
        <div class="inner">
          <h1 class="title">SALA 2</h1>
          <h3 class="subtitle">La sala 2 compta amb una serie molt amplia de màquines per a realitzar qualsevol exercici</h3>
          <h3 class="subtitle">Monitor: Jaume Pique</h3>
          <button class="button" type="submit" name="" value="&#8986; Reservar" onclick="window.location.href='activitats.php'">&#8986; Reservar</button>
        </div>
    </div>
    <div href="#" class="card card3">
        <div class="inner">
          <h1 class="title">SALA 3</h1>
          <h3 class="subtitle">La sala 3 compta amb una piscina gran per a poder realitzar activitats a l'aigua</h3>
          <h3 class="subtitle">Monitor: Albert Font</h3>
          <button class="button" type="submit" name="" value="&#8986; Reservar" onclick="window.location.href='activitats.php'">&#8986; Reservar</button>
        </div>
    </div>
    <div href="#" class="card card4">
        <div class="inner">
          <h1 class="title">SALA 4</h1>
          <h3 class="subtitle">La sala 4 compta amb una gran quantitat de màquines per a realitzar cardio de tot tipus</h3>
          <h3 class="subtitle">Monitora: Maria Sanchez</h3>
          <button class="button" type="submit" name="" value="&#8986; Reservar" onclick="window.location.href='activitats.php'">&#8986; Reservar</button>
        </div>
    </div>
  </main>

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
                <div class="container2">
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

<?php
session_start();
unset($_SESSION["DNI"]);
unset($_SESSION["Contrassenya"]);
header("Location:index.php");
?>

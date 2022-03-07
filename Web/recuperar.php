
<?php
include('config.php');

$correo = $_POST['txtcorreo'];

$queryusuario 	= mysqli_query($con,"SELECT * FROM client WHERE Correu = '$correo'");
$nr 			= mysqli_num_rows($queryusuario);
if ($nr > 0)
{
$mostrar		= mysqli_fetch_array($queryusuario);
$enviarpass 	= base64_decode($mostrar['Contrassenya']);

$paracorreo 		= $correo;
$titulo				= "Recuperar contrasenya";
$mensaje			= $enviarpass;
$tucorreo			= "From: ericestivill123@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
	echo "<script> alert('Contrasenya enviada');window.location= 'index.php' </script>";
}else
{
	echo "<script> alert('Error');window.location= 'index.php' </script>";
}
}
else
{
	echo "<script> alert('Aquest Correu No Existeix');window.location= 'index.php' </script>";
}
/*VaidrollTeam*/
?>

<!DOCTYPE html> <!-- l'arxiu inicial de la pagina web, sol porte logo, imatge, footer i boto per pasa a pagina portada -->

<?php

include('config.php');

if (isset($_POST['login'])) {

    $DNI =  mysqli_real_escape_string($con,$_POST['DNI']);
    $Contrassenya =  mysqli_real_escape_string($con,md5($_POST['Contrassenya']));
    $error = "DNI o Contrassenya incorrectes";
    $error2 = "No estas donat de alta";
    $query2 = $con -> query ("select * from client");
    $valores = mysqli_fetch_array($query2);
    $contra = $valores['Contrassenya'];
    $DNI3 = $valores['DNI'];
    if($DNI==$DNI3 && $contra==$Contrassenya){
    $query = $con -> query ("select a.* from client cl, apuntar a where a.DNI_c='$DNI' AND cl.DNI='$DNI' and cl.Contrassenya='$Contrassenya' ORDER BY a.ID_BAIXA ASC");
        $result = mysqli_fetch_array($query);
        $baixa = $result['ID_BAIXA'];
        $alta = $result['ID_ALTA'];
        if($baixa==null && $alta!=null){
            $_SESSION['DNI'] = $DNI;
            header('Location: Inici.php');
        }else if($baixa!=null && $alta!=null){

            echo "<span class=\"error\">".$error2."</span";
        }

    }else{

        echo "<span class=\"error\">".$error."</span";
    }
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GymBros</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="estil_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  </head>
  <body>
    <form method="post" action="" name="signin-form">
    <section class="form-login">
      <h5>Inicia Sessió</h5>
      <input class="controls" type="text" name="DNI" value="" placeholder="&#128231; DNI" required>
      <input class="controls" type="password" name="Contrassenya" value="" placeholder="&#128274; Contrasenya" required>
      <input class="buttons" type="submit" name="login" value="Ingresar">
    </section>
  </form>
  <script>

  function abrirform() {
document.getElementById("formrecuperar").style.display = "block";

}

function cancelarform() {
document.getElementById("formrecuperar").style.display = "none";
}
  </script>

  <div class="caja_popup" id="formrecuperar">
    <form action="recuperar.php" class="contenedor_popup" method="POST">
          <table>
  		<tr><th colspan="2">Recuperar contrasenya</th></tr>
              <tr>
                  <td><b>&#128231; Correu</b></td>
                  <td><input type="email" name="txtcorreo" required class="cajaentradatexto"></td>
              </tr>
              <tr>
                 <td colspan="2">
  				   <button type="button" onclick="cancelarform()" class="txtrecuperar">Cancelar</button>
  				   <input class="txtrecuperar" type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Desitjes enviar la contrasenya al teu correu?');">
  			</td>
              </tr>
          </table>
      </form>
  	</div>
    <footer>
            <a>Copyright © 2022 GymBros, Inc.</a>
    </footer>


</body>
</html>

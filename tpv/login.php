<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
  <div class="divPrincipal">
    <div class="login">
        <h2>Login</h2>
        <form action="comprobarLogin.php" method="post" onsubmit="return validar()">
            <div class="input"> 
                <label for="" class="label">Usuario</label>
                <input type="usuario" class="" id="usuario" name="usuario">
                <label class="error" id="errorUsuario"></label>
                  <?php
                      if (isset($_SESSION["errorUsuario"])) {
                        echo "<span style='color:red'>".$_SESSION["errorUsuario"]."</span>";
                        unset ($_SESSION["errorUsuario"]);
                      }
                  ?>
            </div>
              
            <div class="input">
                <label for="" class="label">Contraseña</label>
                <input type="password" class="" id="contrasena" name="contrasena" style="color: #BFE4EC">
                <label class="error" id="errorContrasena"></label>
                <?php
                      if (isset($_SESSION["errorContra"])) {
                        echo "<span style='color:red'>".$_SESSION["errorContra"]."</span>";
                        unset ($_SESSION["errorContra"]);
                      }
                  ?>
            </div>
            <button type="submit" class="boton">Login</button>
            <?php
                      if (isset($_SESSION["error"])) {
                        echo "</br>";
                        echo "</br>";
                        echo "<span style='color:red'>".$_SESSION["error"]."</span>";
                        unset ($_SESSION["error"]);
                      }
                  ?>
        </form>
    </div>
  </div>
  

  
      <script>
        function validar() {
          var formvalido = true;
          let usuario = document.getElementById("usuario");
          if (usuario.value == "") {
            document.getElementById("errorUsuario").innerHTML = "Es necesario escribir el campo Usuario";
            formvalido = false;
          }

          let contra = document.getElementById("contrasena");
          if (contra.value == "") {
            document.getElementById("errorContrasena").innerHTML = "Es necesario escribir el campo Contraseña";
            formvalido = false;
        }
        return formvalido;
        
        }
      </script>
</body>
</html>


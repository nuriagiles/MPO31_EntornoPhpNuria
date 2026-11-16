<?php
  session_start();

  $users = [
    ["usuari" => "admin", "password" => "123"],
    ["usuari" => "jugador", "password" => "j123"]
  ];
  

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST['usuari'];
    $password = $_POST['password'];

    //Comprobamos si existe el usuario:
    $Autentificado = false;
    
    foreach($users as $u){
      if($u['usuari'] == $username && $u['password'] == $password){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $Autentificado = true;
      }
    }

    if($Autentificado == true){
      header("Location: pregunta_fomulari.php");
      exit;
    }else{
      $error= "aqui hay un error";
    }
  }
?>
<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <header class="cap">
      <div class="contenidor navegacio">
        <a class="marca" href="index.html">TRIVIAL Pe1</a>
        <nav class="enllacos">
          <a href="index.html">Inici</a><a href="registre.html">Registre</a
          ><a href="login.html">Login</a><a href="joc.html">Joc</a
          ><a href="admin.html">Administració</a>
        </nav>
      </div>
    </header>
    <main class="contenidor">
      <section class="panell ample-mig">
        <h1>Iniciar sessió</h1>
        <p class="subtitol">Accedeix com a jugador o administrador.</p>
        <form action="" method="post">
          <label class="camp"
            >Nom d'usuari<input name="usuari" type="text" required /></label
          ><label class="camp"
            >Contrasenya<input
              name="password"
              type="password"
              required /></label
          ><button class="btn" type="submit">Entrar</button>
        </form>
        <p class="nota">
          La versió PHP ha de verificar la contrasenya i redirigir segons el
          rol.
        </p>
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>

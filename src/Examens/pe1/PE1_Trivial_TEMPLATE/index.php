
<!doctype html>
<html lang="ca">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inici</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
        <!-- AQUEST HEADER HA DE SER REUTILITZABLE -->

    <header class="cap">
      <div class="contenidor navegacio">
        <a class="marca" href="index.php">Trivial Pe1</a>
        <nav class="enllacos">
          <a href="index.php">Inici</a><a href="registre.php">Registre</a
          ><a href="login.php">Login</a><a href="joc.php">Joc</a
          ><a href="admin.php">Administració</a>
        </nav>
      </div>
    </header>
    <main class="contenidor">
      <section class="panell">
        <span class="etiqueta">Examen pràctic · PHP</span>
        <h1>Benvingut al Trivial</h1>
        <p class="subtitol">
          Una aplicació de preguntes de cultura general: quatre categories i
          vuit preguntes inicials.
        </p>
        <div class="grid">
          <div>
            <h2>Soc jugador</h2>
            <p>Registra't, inicia sessió i supera les preguntes una a una.</p>
            <a class="btn" href="registre.php">Crear compte</a>
            <a class="btn btn-sec" href="login.php">Ja tinc compte</a>
          </div>
          <div>
            <h2>Soc administrador</h2>
            <p>
              Gestiona el banc de preguntes: consulta, afegeix, edita i elimina.
            </p>
            <a class="btn btn-sec" href="admin.php">Veure exemple del CRUD</a>
          </div>
        </div>
        
      </section>
    </main>
    <footer class="peu">AQUEST FOOTER HA DE SER REUTILITZABLE</footer>
  </body>
</html>

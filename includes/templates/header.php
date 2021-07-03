
<!doctype html>
<html class="no-js" lang="es-ES">

<head>
  <meta charset="utf-8">
  <title>GDLWEBCAMP - La mejor conferencia de Diseño Web</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
  <link rel="stylesheet" href="css/normalize.css">
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    } else if ($pagina == 'conferencia') {
      echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
  ?>
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
      <div class="hero">
          <div class="contenido-header">
              <nav class="redes-sociales">
                  <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </nav>
              <div class="informacion-evento">
                <div class="clearfix">
                  <p class="fecha"><i class="fa fa-calendar" aria-hidden="true"></i>10-12 Dic</p>
                  <p class="ciudad"><i class="fa fa-map-marker" aria-hidden="true"></i>Buenos Aires, AR</p>
                </div>
                <h1 class="nombre-sitio">GdlWebCamp</h1>

                <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
              </div> <!-- Info Evento -->
               
          </div>
      </div>
  </header>
  
  <div class="barra">
    <div class="container clearfix">
      <div class="logo">
        <a href="index.php">
            <img src="img/logo.svg" alt="Logo">
        </a>  
      </div>

      <div class="mobile-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="main-nav clearfix">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div>
  </div><!-- cierre barra-->
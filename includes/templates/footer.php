<footer class="site-footer">
    <div class="container clearfix">
        <div class="footer-info">
            <h3>Sobre <span>GdlWebCamp</span></h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci repellat in suscipit nesciunt explicabo quibusdam illo ad quae ea reprehenderit, pariatur laborum odit nobis fugiat?</p>
        </div>
        <div class="last-tweets">
            <h3>Últimos <span>tweets</span></h3>
            <ul>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta fugit impedit in cum aut possimus dolore ad vel omnis distinctio.</li>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta fugit impedit in cum aut possimus dolore ad vel omnis distinctio.</li>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta fugit impedit in cum aut possimus dolore ad vel omnis distinctio.</li>
            </ul>
        </div>
        <div>
            <h3>Redes <span>sociales</span></h3>
            <nav class="redes-sociales">
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </nav>
            </div> 
        </div>
    </div>
</footer>


  
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.js"></script>
  <script src="js/jquery.countdown.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<script src="js/jquery.colorbox.js"></script>';
    } else if ($pagina == 'conferencia') {
      echo '<script src="js/lightbox.js"></script>';
    }
  ?>
  <script src="js/main.js"></script>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
<?php include_once 'includes/templates/header.php' ?>

  <section class="container section">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p class="resumen">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo ab voluptates cumque voluptatem perspiciatis, commodi eveniet error! Ipsum ad, nesciunt qui est reiciendis, libero beatae ducimus non officiis itaque eaque. Error eos nobis sed perferendis!
    </p>
  </section>

  <section class="schedule">
    <div class="video-container">
      <video autoplay loop poster="img/bg-talleres.jpg">
      <source src="video/video.mp4" type="video/mp4">
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogv">
      </video>
    </div><!-- Video Container-->

    <div class="schedule-container">
        <div class="container">
            <div class="schedule-events">
                  <h2>Programa del Evento</h2>
                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = " SELECT * FROM `categoria_evento` ";
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            $error = $e->getMessage();
                        }
                    ?>
                  <nav class="menu-schedule">
                    <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) {?>
                        <?php $categoria = $cat['cat_evento']; ?>
                        <a href="#<?php echo strtolower($categoria)?>"><i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i><?php echo $categoria;
                         ?></a>
                    <?php } ?>
                </nav>

                <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " AND eventos.id_cat_evento = 1 ";
                    $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                    $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " AND eventos.id_cat_evento = 2 ";
                    $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                    $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= " AND eventos.id_cat_evento = 3 ";
                    $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                }
                ?>

                <?php $conn->multi_query($sql); ?>

                <?php 
                    do {
                        $resultado = $conn->store_result();
                        $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                    
                    <?php $i = 0; ?>
                    <?php foreach($row as $evento): ?>   
                        <?php if($i % 2 == 0){?>
                            <div id="<?php echo strtolower($evento['cat_evento'])?>" class="info-curso ocultar clearfix">
                        <?php } ?>
                                <div class="event-details">
                                    <h3><?php echo $evento['nombre_evento'];?></h3>
                                    <p> <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $evento['hora_evento'];?></p>
                                    <p> <i class="fa fa-calendar" aria-hidden="true"></i><?php echo $evento['fecha_evento'];?></p>
                                    <p> <i class="fa fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado'];?></p>
                            </div>
                                    
                        <?php if($i % 2 == 1): ?>
                            <a href="calendario.php" class="button float-right">Ver Todos</a>
                            </div> <!--ID TALLERES-->
                        <?php endif; ?>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    
                    <?php $resultado->free(); ?>

                <?php  } while ($conn->more_results() && $conn->next_result() );

                ?>

                
            </div> <!--Schedule Events-->
        </div>
    </div>
  </section><!--Schedule-->

  <?php include_once 'includes/templates/invitados.php'; ?>  

  <div class='counter parallax'>
      <div class="container">
          <ul class="event-briefing clearfix">
              <li><p class="numero"></p>Invitados</li>
              <li><p class="numero"></p>Talleres</li>
              <li><p class="numero"></p>Días</li>
              <li><p class="numero"></p>Conferencias</li>
          </ul>
      </div>
  </div>

  <section class="section prices">
    <h2>Precios</h2>
    <div class="container">
        <ul class="prices-list clearfix">
            <li>
                <div class="tabla-precio">
                    <h3>Pase por día</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Todos los días</h3>
                    <p class="numero">$50</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button">Comprar</a>
                </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Pase por 2 días</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
        </ul>
    </div>
  </section>

  <div class="mapa" id="mapa"> </div>

  <section class="section">
      <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero, modi, ab ipsa tempore qui quia quaerat ea doloremque nam vero porro ex eaque aperiam alias autem. Deleniti voluptas voluptates quos.</p>
                    <footer class='info-testimonial clearfix'>
                        <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Héctor Donoso <span>Desarrollador en @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div> <!-- Fin testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero, modi, ab ipsa tempore qui quia quaerat ea doloremque nam vero porro ex eaque aperiam alias autem. Deleniti voluptas voluptates quos.</p>
                    <footer class='info-testimonial clearfix'>
                        <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Héctor Donoso <span>Desarrollador en @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div> <!-- Fin testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero, modi, ab ipsa tempore qui quia quaerat ea doloremque nam vero porro ex eaque aperiam alias autem. Deleniti voluptas voluptates quos.</p>
                    <footer class='info-testimonial clearfix'>
                        <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                        <cite>Héctor Donoso <span>Desarrollador en @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div> <!-- Fin testimonial-->
        </div>
  </section>

  <div class="newsletter parallax">
      <div class="container contenido">
          <p>Regístrate al newsletter</p>
          <h3>GdlWebCamp</h3>
          <a href="#" class="button transparent">Registro</a>
      </div>
  </div>

  <section class='section'>
      <h2>Faltan</h2>
      <div class="countdown container">
        <ul class="clearfix">
            <li><p id='dias' class="numero"></p>días</li>
            <li><p id='horas' class="numero"></p>horas</li>
            <li><p id='minutos' class="numero"></p>minutos</li>
            <li><p id='segundos' class="numero"></p>segundos</li>

        </ul>
      </div>

  </section>

  <?php include_once 'includes/templates/footer.php' ?>


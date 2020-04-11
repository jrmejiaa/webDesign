<?php include_once 'includes/templates/header.php'; ?>
<section class="container section">
    <h2>La Mejor Conferencia de Diseño Web en Español</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus earum laboriosam rem unde, quae culpa. Repudiandae nihil numquam optio recusandae totam quo ea, sed eos exercitationem atque natus consectetur voluptas? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt illo est inventore. </p>
</section> <!-- Section basic -->

<section class="program">
    <div class="containerVideo">
        <video autoplay loop muted>
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogv">
        </video>
    </div> <!-- Video Container -->

    <div class="programContent">
        <div class="container">
            <div class="eventProgram">
                <h2>Programa del Evento </h2>
                <?php
                try {
                    // Make a connection with the database
                    require_once('includes/functions/db_connection.php');

                    // SQL Command to get the elements that we need using JOIN
                    $sql = " SELECT * FROM categoria_evento";

                    // Send the SQL Command to MySQL to return the data
                    $result = $conn->query($sql);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                ?>
                <nav class="menuProgram">
                    <?php while ($cat = $result->fetch_array(MYSQLI_ASSOC)) :
                        $eventName = $cat['cat_evento'];
                    ?>
                        <a href="#<?php echo strtolower($eventName); ?>">
                            <i class="fas <?php echo $cat['icono']; ?>"></i> <?php echo $eventName; ?>
                        </a>
                    <?php endwhile; ?>
                </nav>

                <?php
                try {
                    // Make a connection with the database
                    require_once('includes/functions/db_connection.php');

                    // SQL Command to get the elements that we need using JOIN
                    $sql = " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.id_invitados ";
                    $sql .= " AND eventos.id_cat_evento = 1";
                    $sql .= " ORDER BY id_evento LIMIT 2; ";
                    $sql .= " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.id_invitados ";
                    $sql .= " AND eventos.id_cat_evento = 2";
                    $sql .= " ORDER BY id_evento LIMIT 2; ";
                    $sql .= " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $sql .= " FROM eventos ";
                    $sql .= " INNER JOIN categoria_evento ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN invitados ";
                    $sql .= " ON eventos.id_inv = invitados.id_invitados ";
                    $sql .= " AND eventos.id_cat_evento = 3";
                    $sql .= " ORDER BY id_evento LIMIT 2; ";

                    // Send the SQL Command to MySQL to return the multi_query data
                    $conn->multi_query($sql);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                ?>

                <?php
                // Unix 
                setlocale(LC_TIME, 'es_ES.UTF-8');
                // Windows
                setlocale(LC_TIME, 'spanish');
                do {
                    $result = $conn->store_result(T_EMPTY);
                    $row = $result->fetch_all(MYSQLI_ASSOC);
                    $i = 0;
                    foreach ($row as $event) :
                ?>
                        <?php if ($i == 0) : ?>
                            <div id="<?php echo strtolower($event['cat_evento']); ?>" class="infoCurse ocultar">
                            <?php endif; ?>
                            <div class="eventDetail">
                                <h3><?php echo $event['nombre_evento']; ?></h3>
                                <p><i class="far fa-clock"></i><?php echo $event['hora_evento']; ?></p>
                                <p><i class="fas fa-calendar"></i><?php echo strftime('%A, %d de %B del %Y', strtotime($event['fecha_evento'])); ?></p>
                                <p><i class="fas fa-user"></i><?php echo $event['nombre_invitado'] . " " . $event['apellido_invitado']; ?></p>
                            </div>
                            <?php if ($i == 1) : ?>
                                <div class="flex-right">
                                    <a href="calendario.php" class="button ">Ver Todos</a>
                                </div>
                            </div> <!-- #workshops -->
                        <?php endif; ?>
                <?php
                        $i++;
                    endforeach;
                    $result->free();
                } while ($conn->more_results() && $conn->next_result());
                ?>
            </div>
            <!--Event Program -->
        </div> <!-- Container div -->
    </div> <!-- Program Content -->
</section> <!-- Program of the Conference -->

<?php include_once 'includes/templates/invitados_temp.php'; ?>

<div class="counter parallax">
    <div class="container">
        <ul class="summaryEvent">
            <li>
                <p class="number"></p>
                <p>Invitados</p>
            </li>
            <li>
                <p class="number"></p>
                <p>Talleres</p>
            </li>
            <li>
                <p class="number"></p>
                <p>Días</p>
            </li>
            <li>
                <p class="number"></p>
                <p>Conferencias</p>
            </li>
        </ul>
    </div>
</div>

<section class="prices section">
    <h2>Precios</h2>
    <div class="container">
        <ul class="listPrices">
            <li>
                <div class="tablePrice">
                    <h3>Pase por día</h3>
                    <p class="number">$30</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las Conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>

            <li>
                <div class="tablePrice">
                    <h3>Todos los días</h3>
                    <p class="number">$50</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las Conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button">Comprar</a>
                </div>
            </li>

            <li>
                <div class="tablePrice">
                    <h3>Pase por 2 días</h3>
                    <p class="number">$45</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las Conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
        </ul>
    </div>
</section>

<div id="map" class="map">

</div>

<section class="section container">
    <h2>Testimoniales</h2>
    <div class="testimonials">
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nostrum, ipsum alias architecto temporibus libero est expedita vero.</p>
                <footer class="infoTestimonial">
                    <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                    <cite>
                        Oswaldo Aponte Escobedo
                        <span>Diseñador en @prisma</span>
                    </cite>
                </footer>
            </blockquote>
        </div> <!-- Fin Testimonial -->

        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nostrum, ipsum alias architecto temporibus libero est expedita vero</p>
                <footer class="infoTestimonial">
                    <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                    <cite>
                        Oswaldo Aponte Escobedo
                        <span>Diseñador en @prisma</span>
                    </cite>
                </footer>
            </blockquote>
        </div> <!-- Fin Testimonial -->

        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nostrum, ipsum alias architecto temporibus libero est expedita vero</p>
                <footer class="infoTestimonial">
                    <img src="img/testimonial.jpg" alt="Imagen Testimonial">
                    <cite>
                        Oswaldo Aponte Escobedo
                        <span>Diseñador en @prisma</span>
                    </cite>
                </footer>
            </blockquote>
        </div> <!-- Fin Testimonial -->
    </div> <!-- Fin Testimonials -->
</section>

<div class="newsletter parallax">
    <div class="content container">
        <p>regístrate al newsletter</p>
        <h3>GdlWebCamp</h3>
        <a href="#mc_embed_signup" class="button buttonNewsLetter transparent">Registro</a>
    </div>
</div>
<div style="display: none">
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup {
            background: #fff;
            clear: left;
            font: 14px Helvetica, Arial, sans-serif;
        }

        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup">
        <form action="https://gyaseguros.us19.list-manage.com/subscribe/post?u=4786a7d3fbf790ddae22e7fa7&amp;id=de2935cf94" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
                <h2>Suscribete a nuestro Newsletter</h2>
                <div class="indicates-required"><span class="asterisk">*</span>Campo Requerido</div>
                <div class="mc-field-group">
                    <label for="mce-EMAIL">Tu Correo Electrónico<span class="asterisk">*</span>
                    </label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4786a7d3fbf790ddae22e7fa7_de2935cf94" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
    </div>
</div>
<!--End mc_embed_signup-->

<section class="section container">
    <h2>Faltan</h2>
    <div class="countdown">
        <ul>
            <li>
                <p id="days" class="number"></p>Días
            </li>
            <li>
                <p id="hours" class="number"></p>Horas
            </li>
            <li>
                <p id="minutes" class="number"></p>Minutos
            </li>
            <li>
                <p id="seconds" class="number"></p>Segundos
            </li>
        </ul>
    </div>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
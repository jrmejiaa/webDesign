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
                    <nav class="menuProgram">
                        <a href="#talleres"><i class="fas fa-code"></i> Talleres</a>
                        <a href="#conferencias"><i class="fas fa-comment"></i> Conferencias</a>
                        <a href="#seminarios"><i class="fas fa-university"></i> Seminarios</a>
                    </nav>

                    <div id="talleres" class="infoCurse ocultar">
                        <div class="eventDetail">
                            <h3>HTML5, CSS3 y JavaScript</h3>
                            <p><i class="far fa-clock"></i> 16:00 hrs</p>
                            <p><i class="fas fa-calendar"></i> 10 de Diciembre</p>
                            <p><i class="fas fa-user"></i> Jairo R. Mejia A.</p>
                        </div>

                        <div class="eventDetail">
                            <h3>Responsive Web Design</h3>
                            <p><i class="far fa-clock"></i> 20:00 hrs</p>
                            <p><i class="fas fa-calendar"></i> 10 de Diciembre</p>
                            <p><i class="fas fa-user"></i> Jairo R. Mejia A.</p>
                        </div>
                        <div class="flex-right">
                            <a href="#" class="button ">Ver Todos</a>
                        </div>  
                    </div> <!-- #workshops -->

                    <div id="conferencias" class="infoCurse ocultar">
                        <div class="eventDetail">
                            <h3>Como ser Freelancer</h3>
                            <p><i class="far fa-clock"></i> 10:00 hrs</p>
                            <p><i class="fas fa-calendar"></i> 10 de Diciembre</p>
                            <p><i class="fas fa-user"></i> Gregorio Sanchez</p>
                        </div>

                        <div class="eventDetail">
                            <h3>Tecnologías del Futuro</h3>
                            <p><i class="far fa-clock"></i> 17:00 hrs</p>
                            <p><i class="fas fa-calendar"></i> 10 de Diciembre</p>
                            <p><i class="fas fa-user"></i> Susan Sanchez</p>
                        </div>
                        <div class="flex-right">
                            <a href="#" class="button ">Ver Todos</a>
                        </div>  
                    </div> <!-- #workshops -->

                    <div id="seminarios" class="infoCurse ocultar">
                        <div class="eventDetail">
                            <h3>Diseño IU/UX para móviles</h3>
                            <p><i class="far fa-clock"></i> 17:00 hrs</p>
                            <p><i class="fas fa-calendar"></i> 11 de Diciembre</p>
                            <p><i class="fas fa-user"></i> Harold García</p>
                        </div>

                        <div class="eventDetail">
                            <h3>Aprende a programar en una mañana</h3>
                            <p><i class="far fa-clock"></i> 10:00 hrs</p>
                            <p><i class="fas fa-calendar"></i> 11 de Diciembre</p>
                            <p><i class="fas fa-user"></i> Susan Arrivera</p>
                        </div>
                        <div class="flex-right">
                            <a href="#" class="button ">Ver Todos</a>
                        </div>  
                    </div> <!-- #workshops -->
                </div> <!--Event Program -->
            </div> <!-- Container div -->
        </div> <!-- Program Content -->
    </section> <!-- Program of the Conference -->

    <section class="invitation container section">
        <h2>Nuestros Invitados</h2>
        <ul class="invitationList clearfix">
            <li>
                <div class="invited">
                    <img src="img/invitado1.jpg" alt="Invitado 1">
                    <p>Rafael Bautista</p>
                </div>
            </li>

            <li>
                <div class="invited">
                    <img src="img/invitado2.jpg" alt="Invitado 2">
                    <p>Shari Herrera</p>
                </div>
            </li>

            <li>
                <div class="invited">
                    <img src="img/invitado3.jpg" alt="Invitado 3">
                    <p>Gregorio Sanchez</p>
                </div>
            </li>

            <li>
                <div class="invited">
                    <img src="img/invitado4.jpg" alt="Invitado 4">
                    <p>Susana Rivera</p>
                </div>
            </li>

            <li>
                <div class="invited">
                    <img src="img/invitado5.jpg" alt="Invitado 5">
                    <p>Harold Garcia</p>
                </div>
            </li>

            <li>
                <div class="invited">
                    <img src="img/invitado6.jpg" alt="Invitado 6">
                    <p>Susan Sanchez</p>
                </div>
            </li>
        </ul>
    </section>

    <div class="counter parallax">
        <div class="container">
            <ul class="summaryEvent">
                <li>
                    <p class="number"></p><p>Invitados</p>
                </li>
                <li>
                    <p class="number"></p><p>Talleres</p>
                </li>
                <li>
                    <p class="number"></p><p>Días</p>
                </li>
                <li>
                    <p class="number"></p><p>Conferencias</p>
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
            <a href="registro.html" class="button transparent">Registro</a>
        </div>
    </div>

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
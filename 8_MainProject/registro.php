<?php include_once 'includes/templates/header.php' ?>
    
    <section class="container">
        <h2>Registro de Usuarios</h2>
        <form action="index.html" id="register" class="register" method="POST">
            <fieldset class="register box containerCenter" id="dataUser">
                <legend>Información Personal</legend>
                <!-- Form for Name -->
                <div class="field">
                    <label for="nameUser">Nombre:</label>
                    <input type="text" id="nameUser" name="nameUser" placeholder="Tu Nombre" required>
                </div>
                <!-- Form for Lastname -->
                <div class="field">
                    <label for="lastName">Apellido:</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Tu Apellido" required>
                </div>
                <!-- Form for Email -->
                <div class="field">
                    <label for="email">E-Mail:</label>
                    <input type="email" id="email" name="email" placeholder="Tu E-Mail" required>
                </div>

                <div id="error" class="error"></div>
            </fieldset>  <!-- Final DataUser-->

            <div class="package" id="package">
                <h3>Elige el Número de Boletos</h3>
                <ul class="listPrices">
                <li>
                    <div class="tablePrice">
                        <h3>Pase por día (VIERNES)</h3>
                        <p class="number">$30</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las Conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <div class="order">
                            <label for="dayPass">Boletos Deseados</label>
                            <input type="number" min="0" id="dayPass" size="3" placeholder="0"> 
                        </div>
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
                        <div class="order">
                            <label for="allPass">Boletos Deseados</label>
                            <input type="number" min="0" id="allPass" size="3" placeholder="0"> 
                        </div>
                    </div>
                </li>

                <li>
                    <div class="tablePrice">
                        <h3>Pase 2 días (VIERNES Y SÁBADO)</h3>
                        <p class="number">$45</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las Conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <div class="order">
                            <label for="day2Pass">Boletos Deseados</label>
                            <input type="number" min="0" id="day2Pass" size="3" placeholder="0"> 
                        </div>
                    </div>
                </li>
            </ul>
            </div> <!-- Final Packages -->

            <div id="eventos" class="eventos">
                <h3>Elige tus talleres</h3>
                <div class="box">
                        <div id="viernes" class="contenido-dia">
                            <h4>Viernes</h4>
                            <div class="checkboxContent">
                                <div>
                                    <p>Talleres:</p>
                                    <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time> Responsive Web Design</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time> Flexbox</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time> HTML5 y CSS3</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time> Drupal</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time> WordPress</label>
                                </div>
                                <div>
                                    <p>Conferencias:</p>
                                    <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Como ser Freelancer</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time> Tecnologías del Futuro</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time> Seguridad en la Web</label>
                                </div>
                                <div>
                                    <p>Seminarios:</p>
                                    <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI y UX para móviles</label>
                                </div>
                            </div>
                        </div> <!--#viernes-->
                        <div id="sabado" class="contenido-dia">
                            <h4>Sábado</h4>
                            <div class="checkboxContent">
                                <div>
                                    <p>Talleres:</p>
                                    <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> AngularJS</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP y MySQL</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> JavaScript Avanzado</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO en Google</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 y CSS3</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP Medio y Avanzado</label>
                                </div>
                                <div>
                                    <p>Conferencias:</p>
                                    <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Como crear una tienda online que venda millones en pocos días</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Los mejores lugares para encontrar trabajo</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> Pasos para crear un negocio rentable</label>
                                </div>
                                <div>
                                    <p>Seminarios:</p>
                                    <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> Aprende a Programar en una mañana</label>
                                    <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> Diseño UI y UX para móviles</label>
                                </div>
                            </div>
                        </div> <!--#sabado-->
                    <div id="domingo" class="contenido-dia">
                        <h4>Domingo</h4>
                        <div class="checkboxContent">
                            <div>
                                <p>Talleres:</p>
                                <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Laravel</label>
                                <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API</label>
                                <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> JavaScript y jQuery</label>
                                <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Creando Plantillas para WordPress</label>
                                <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> Tiendas Virtuales en Magento</label>
                            </div>
                            <div>
                                <p>Conferencias:</p>
                                <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time> Como hacer Marketing en línea</label>
                                <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que lenguaje debo empezar?</label>
                                <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time> Frameworks y librerias Open Source</label>
                            </div>
                            <div>
                                <p>Seminarios:</p>
                                <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Creando una App en Android en una tarde</label>
                                <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> Creando una App en iOS en una tarde</label>
                            </div>
                        </div>
                    </div> <!--#domingo-->
                  </div><!--.box-->
            </div> <!--#eventos-->

            <div class="summary containerCenter" id="summary">
                <h3>Pago y Extras</h3>
                <div class="box summary-flex">
                    <div class="extras">
                        <p>Extras</p>
                        <div class="order">
                            <label for="shirtEvent">Camisa del Evento $10<br><small>(Promoción 7% dcto.)</small></label>
                            <input type="number" min="0" id="shirtEvent" size="3" placeholder="0">
                        </div> <!--Order -->

                        <div class="order">
                            <label for="etiquetas">Paquete 10 etiquetas $2 <br><small>(HTML5, CSS3, JavaScript)</small></label>
                            <input type="number" min="0" id="etiquetas" size="3" placeholder="0">
                        </div> <!--Order -->
                        <div class="order">
                            <label for="gift">Seleccione un regalo</label>
                            <select name="gift" id="gift" required>
                                <option value="" disabled selected>-- Seleccione un regalo --</option>
                                <option value="eti">Etiquetas</option>
                                <option value="pul">Pulsera</option>
                                <option value="plu">Pluma</option>
                            </select>
                        </div> <!--Order -->

                        <input type="button" id="calcular" class="button" value="calcular">
                    </div> <!-- Extras -->

                    <div id="completeTotal" class="total">
                        <p>Resumen</p>
                        <div id="productList" class="productList">

                        </div>
                        <div id="totalSum" class="totalSum">

                        </div>
                        <input type="submit" id="buttonRegister" class="button" value="Pagar">
                    </div>
                </div>
            </div> <!--Summary-->
        </form>
    </section>

<?php include_once 'includes/templates/footer.php' ?>

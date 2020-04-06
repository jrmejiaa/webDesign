<?php include_once 'includes/templates/header.php' ?>

    <section class="container section">
        <h2>Calendario De Eventos</h2>

        <?php 
            try {
                // Make a connection with the database
                require_once('includes/functions/db_connection.php');
                
                // SQL Command to get the elements that we need using JOIN
                $sql = " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.id_invitados ";
                $sql .= " ORDER BY id_evento ";
                
                // Send the SQL Command to MySQL to return the data
                $result = $conn->query($sql);
            } catch (\Throwable $th) {
                //throw $th;
            }
        ?>

        <div class="calendar">
            <?php 
                $calendar = array();
                // It uses a while using the command fetch_assoc to get the information from the database 
                while($events = $result->fetch_assoc()):
                    // get the date to remake the array for a better understanding
                    $date_event = $events['fecha_evento'];
                    $event = array(
                        'title' => $events['nombre_evento'],
                        'date' => $events['fecha_evento'],
                        'time' => $events['hora_evento'],
                        'category' => $events['cat_evento'],
                        'invitado' => $events['nombre_invitado'] . " " . $events['apellido_invitado']
                    );
                    // Creates an array who make a group using the date
                    $calendar[$date_event][] = $event;
                endwhile;
            ?>    
                <!-- // Print all the events -->
                <?php foreach ($calendar as $day => $listEvents):?> 
                    <h3>
                        <i class="fa fa-calendar"></i>
                        <?php
                            // Unix 
                            setlocale(LC_TIME,'es_ES.UTF-8');
                            // Windows
                            setlocale(LC_TIME,'spanish');

                            echo strftime('%A, %d de %B del %Y', strtotime($day));
                        ?>
                    </h3>

                    <?php foreach ($listEvents as $event):?>
                        <div class="day">
                            <p class="title">
                                <?php echo $event['title']; ?>
                            </p>
                            <p class="hour"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?php echo $event['date']  . " " . $event['time']; ?>
                            </p>
                            <pre>
                                <?php var_dump($event); ?>
                            </pre>
                        </div>
                    <?php endforeach; // End foreach listEvents?>

                <?php endforeach; // End foreach Calendar?>
        </div>
        
        <?php $conn->close(); ?>

    </section> <!-- Section basic -->

<?php include_once 'includes/templates/footer.php' ?>
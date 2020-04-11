<section class="container section">
    <?php
    try {
        // Make a connection with the database
        require_once('includes/functions/db_connection.php');

        // SQL Command to get the elements that we need using JOIN
        $sql = " SELECT * FROM invitados ";

        // Send the SQL Command to MySQL to return the data
        $result = $conn->query($sql);
    } catch (\Throwable $th) {
        //throw $th;
    }
    ?>

    <main class="invitation container section">
        <h2>Nuestros Invitados</h2>
        <ul class="invitationList">
            <?php
            // It uses a while with command fetch_assoc to get the information from the database 
            while ($invited = $result->fetch_assoc()) :
                // get the date to remake the array for a better understanding 
            ?>
                <li>
                    <div class="invited">
                        <a class="invitedInfo fixPadding" href="#invitado_<?php echo $invited['id_invitados']; ?>">
                            <img src="img/<?php echo $invited['url_imagen']; ?>" alt="Invitado 1">
                            <p><?php echo $invited['nombre_invitado'] . " " . $invited['apellido_invitado']; ?></p>
                        </a>
                    </div>
                </li>
                <div style="display: none">
                    <div class="invitedInfo" id="invitado_<?php echo $invited['id_invitados']; ?>">
                        <h2><?php echo $invited['nombre_invitado'] . " " . $invited['apellido_invitado']; ?></h2>
                        <img src="img/<?php echo $invited['url_imagen']; ?>" alt="Invitado 1">
                        <p><?php echo $invited['descripcion']; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </ul>
    </main>


    <!-- Close section in the MySQL -->
    <?php $conn->close(); ?>

</section> <!-- Section basic -->
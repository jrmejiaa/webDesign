<?php
include_once 'includes/functions/functions.php';
if (isset($_POST['submit'])) :
    $name = $_POST['nameUser'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gift = $_POST['gift'];
    $totalPay = $_POST['totalPay'];
    $date = date('Y-m-d H:i:s');
    // Orders
    $tickets = $_POST['tickets'];
    $shirtOrder = $_POST['shirtOrder'];
    $labelOrder = $_POST['labelOrder'];
    $completeOrder = productsJSON($tickets, $shirtOrder, $labelOrder);
    // Events to make the JSON 
    $events = $_POST['registro'];
    $registerEvents = eventJSON($events);
    // Connection to the database
    // The VALUES (?,?,?,?) are using JUST with Statements that PHP and MySQL can use
    $sql = " INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?);";
    try {
        require_once('includes/functions/db_connection.php');
        // It needs always a variable Statement to make this process the whole process is explain below
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssis", $name, $lastName, $email, $date, $completeOrder, $registerEvents, $gift, $totalPay);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location: validationRegister.php?success=1');
    } catch (\Throwable $th) {
        //throw $th;
    }
endif;
?>

<?php include_once 'includes/templates/header.php' ?>

<section class="section container">
    <h2>Resumen de Registro</h2>
</section>
<?php include_once 'includes/templates/footer.php' ?>
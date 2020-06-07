<?php

// Start to include all the files to save the information of a new Registration
include_once 'includes/functions/functions.php';
require 'includes/configPaypal.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

if (!isset($_POST['submit'])) {
    exit("Hubo un error");
}
if (isset($_POST['submit'])) :
    $name = $_POST['nameUser'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $gift = $_POST['gift'];
    $totalPay = $_POST['totalPay'];
    $date = date('Y-m-d H:i:s');
    // Orders
    $tickets = $_POST['tickets'];
    $extraOrder = $_POST['extra'];

    $shirtOrder = $_POST['extra']['shirtOrder']['amount'];
    $shirtOrderPrice = $_POST['extra']['shirtOrder']['price'];
    $labelOrder = $_POST['extra']['labelOrder']['amount'];
    $labelOrderPrice = $_POST['extra']['labelOrder']['price'];
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
        $ID_register = $stmt->insert_id;
        $stmt->execute();
        $stmt->close();
        $conn->close();
        // header('Location: validationRegister.php?success=1');
    } catch (\Throwable $th) {
        //throw $th;
        echo "Hay un error en la base de datos";
        echo $th->getMessage();
    }

endif;

$compra = new Payer();
$compra->setPaymentMethod("paypal");

// Start to fill the articles
$i = 0;
$arrayOrder = array();
foreach ($tickets as $key => $value) {
    if ((int) $value['amount'] > 0) {
        ${"article$i"} = new Item();
        $arrayOrder[] = ${"article$i"};
        ${"article$i"}->setName('Pase: ' . $key)
            ->setCurrency("USD")
            ->setQuantity((int) $value['amount'])
            ->setPrice((int) $value['price']);
        $i++;
    }
}

foreach ($extraOrder as $key => $value) {
    if ((int) $value['amount'] > 0) {

        if ($key == "shirtOrder") {
            $price = (float) $value['price'] * 0.93;
        } else {
            $price = (float) $value['price'];
        }

        ${"article$i"} = new Item();
        $arrayOrder[] = ${"article$i"};
        ${"article$i"}->setName('Extras: ' . $key)
            ->setCurrency("USD")
            ->setQuantity((int) $value['amount'])
            ->setPrice($price);
        $i++;
    }
}

$ArticleList = new ItemList();
$ArticleList->setItems($arrayOrder);

$amountOrder = new Amount();
$amountOrder->setCurrency("USD")
    ->setTotal($totalPay);

$transaction = new Transaction();
$transaction->setAmount($amountOrder)
            ->setItemList($ArticleList)
            ->setDescription("Pago GDLWEBCAMP")
            ->setInvoiceNumber($ID_register);

$redirection = new RedirectUrls();
$redirection->setReturnUrl(URL_Site . "/pagoFinalizado-php?exito=true&id_pago={$ID_register}")
            ->setCancelUrl(URL_Site . "/pagoFinalizado-php?exito=false&id_pago={$ID_register}");

$payment = new Payment();
$payment->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redirection)
        ->setTransactions(array($transaction));


try {
    $payment->create($apiContext);
} catch (\PayPal\Exception\PayPalConnectionException $pse) {
    echo "<pre>";
    echo print_r(json_decode($pse->getData()));
    exit;
}

$approval = $payment->getApprovalLink();

header("Location :{$approval}");
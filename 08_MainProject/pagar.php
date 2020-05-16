<?php

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

if (!isset($_POST['producto'], $_POST['precio'])) {
    exit("Hubo un error");
}

require 'includes/functions/configPaypal.php';

$producto = htmlspecialchars($_POST['producto']);
$precio = (int) htmlspecialchars($_POST['precio']);
$envio = 3;
$taxes = 0;

$total = $precio + $envio + $taxes;

$compra = new Payer();
$compra->setPaymentMethod("paypal");

$articulo = new Item();
$articulo->setName($producto)
    ->setCurrency("USD")
    ->setQuantity(1)
    ->setPrice($precio);

$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));

$detalles = new Details();
$detalles->setShipping($envio)
    ->setTax($taxes)
    ->setSubtotal($precio);

$cantidad = new Amount();
$cantidad->setCurrency("USD")
    ->setTotal($total)
    ->setDetails($detalles);

$transaction = new Transaction();
$transaction->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription("Pago")
            ->setInvoiceNumber(uniqid());

$redirection = new RedirectUrls();
$redirection->setReturnUrl(URL_Site . "/pagoFinalizado-php?exito=true")
            ->setCancelUrl(URL_Site . "/pagoFinalizado-php?exito=false");

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
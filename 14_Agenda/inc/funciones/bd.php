<?php

// credenciales de la base de datos
define('DB_USUARIO', 'root');
define('DB_PASSWORD', 'JairoM2708');
define('DB_HOST', 'localhost');
define('DB_NOMBRE', 'agenda_php');

$conn = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE );

if($conn->connect_error){
    echo $error = $conn->connect_error;
}
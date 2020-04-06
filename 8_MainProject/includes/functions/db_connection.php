<?php 
    $conn = new mysqli('localhost', 'root','JairoM2708','gdlwewebcamp');

    if($conn->connect_error){
        echo $error = $conn->connect_error;
    }
?>
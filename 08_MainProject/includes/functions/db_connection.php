<?php 
    $conn = new mysqli('localhost', 'root','JairoM2708','gdlwebcamp');

    if($conn->connect_error){
        echo $error = $conn->connect_error;
    }
?>
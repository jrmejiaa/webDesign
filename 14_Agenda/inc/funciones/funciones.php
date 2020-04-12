<?php

function obtenerContactos() {
     include 'bd.php';
     try{
          return $conn->query("SELECT id_contacto, nombre, empresa, telefono FROM contactos");
     } catch(Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
     }
}

// Obtiene un contacto toma un id_contacto.

function obtenerContacto($id_contacto) {
     include 'bd.php';
     try{
          return $conn->query("SELECT id_contacto, nombre, empresa, telefono FROM contactos WHERE id_contacto = $id_contacto");
     } catch(Exception $e) {
          echo "Error!!" . $e->getMessage() . "<br>";
          return false;
     }
}
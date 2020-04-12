<?php 
     if($_POST['accion'] == "crear"){
          // It is going to create a new contact
          require_once('../funciones/bd.php');

          // Check the entries
          $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
          $empresa = filter_var($_POST['empresa'],FILTER_SANITIZE_STRING);
          $telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);

          try {
               $sql = " INSERT INTO contactos (nombre, empresa, telefono) VALUES (?,?,?); ";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param('sss',$nombre,$empresa,$telefono);
               $stmt->execute();
               if($stmt->affected_rows == 1){
                    $response = array(
                         'response' => 'correct',
                         'id_inserted' => $stmt->insert_id   ,
                         'data' => array(
                              'nombre' => $nombre,
                              'empresa' => $empresa,
                              'telefono' => $telefono
                         )
                    );
               }
               $stmt->close();
               $conn->close();
          } catch (\Throwable $th) {
               $response = array(
                    'error' => $th->getMessage()
               );
          }

          echo json_encode($response);
     }
?>

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

     if($_GET['accion'] == "borrar"){
          // It is going to delete a specific contact
          require_once('../funciones/bd.php');

          $id = filter_var($_GET['id_contacto'],FILTER_SANITIZE_NUMBER_INT);
          try {
               $sql = " DELETE FROM contactos WHERE id_contacto = ? ";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("i",$id);
               $stmt->execute();

               if($stmt->affected_rows == 1){
                    $response = array(
                         'respuesta' => 'correcto'
                    );
               }else{
                    $response = array(
                         'error' => 'no se encontro el ID',
                         'id' => $id
                    );
               }

               $stmt->close();
               $conn->close();
          } catch (\Throwable $th) {
               //throw $th;
               $response = array(
                    'error' => $th->getMessage()
               );
          }
          echo json_encode($response);
     }

     if($_POST['accion'] == "editar"){
          // It is going to create a new contact
          require_once('../funciones/bd.php');

          // Check the entries
          $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
          $empresa = filter_var($_POST['empresa'],FILTER_SANITIZE_STRING);
          $telefono = filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);
          $id = filter_var($_POST['id_contacto'],FILTER_SANITIZE_NUMBER_INT);

          try {
               $sql = " UPDATE contactos SET nombre = ?, empresa = ?, telefono = ? WHERE id_contacto = ?;";
               $stmt = $conn->prepare($sql);
               $stmt->bind_param("sssi",$nombre,$empresa,$telefono,$id); 
               $stmt->execute();

               if($stmt->affected_rows == 1){
                    $response = array(
                         'respuesta' => 'correcto'
                    );
               }else{
                    $response = array(
                         'error' => 'no se encontro el ID',
                         'id' => $id
                    );
               }

               $stmt->close();
               $conn->close();
          } catch (\Throwable $th) {
               //throw $th;
               $response = array(
                    'error' => $th->getMessage()
               );
          }
          echo json_encode($response);
     }
?>


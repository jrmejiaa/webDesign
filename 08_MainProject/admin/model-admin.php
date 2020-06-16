<?php
include_once "functions/functions.php";
$user = $_POST['user'];
$nameUser = $_POST['nameUser'];
$pass = $_POST['password'];
$options = array(
    'cost' => 12
);
$password = password_hash($pass, PASSWORD_BCRYPT, $options);

if ($_POST["state-admin"] == "create") {

    // Start connection with the database 
    try {
        $stmt = $conn->prepare("INSERT INTO admins (user, nameUser, password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user, $nameUser, $password);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            $response = array(
                'response' => 'correct',
                'id_inserted' => $stmt->insert_id
            );
        } else {
            $response = array(
                'response' => 'error',
            );
        }
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        $response = array(
            'response' => 'error',
            'message' => $th->getMessage()
        );
    }

    // Send a response of a successful operation
    echo json_encode($response);
}

if ($_POST["state-admin"] == "update") {
    $id = $_POST['id_register'];
    // Start connection with the database 
    try {
        if (empty($pass)) {
            $sql = "UPDATE admins SET user = ?, nameUser = ?, edited_admin = NOW() WHERE id_admin = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $user, $nameUser, $id);
        } else {
            $sql = "UPDATE admins SET user = ?, nameUser = ?, password = ?, edited_admin = NOW() WHERE id_admin = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $user, $nameUser, $password, $id);
        }
        $stmt->execute();
        if ($stmt->affected_rows) {
            $response = array(
                'response' => 'update',
                'id_inserted' => $stmt->insert_id
            );
        } else {
            $response = array(
                'response' => 'error',
            );
        }
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        $response = array(
            'response' => 'error',
            'message' => $th->getMessage()
        );
    }

    // Send a response of a successful operation
    echo json_encode($response);
}

if ($_POST["state-admin"] == "delete") {
    $id_delete = $_POST['id_delete'];
    // Start connection with the database 
    try {
        $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ?");
        $stmt->bind_param('i', $id_delete);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $response = array(
                'response' => 'delete',
                'id_delete' => $id_delete
            );
        } else {
            $response = array(
                'response' => 'error',
            );
        }
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        $response = array(
            'response' => 'error',
            'message' => $th->getMessage()
        );
    }

    // Send a response of a successful operation
    echo json_encode($response);
}

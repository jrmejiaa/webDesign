<?php

if (isset($_POST["add-admin"])) {
    $user = $_POST['user'];
    $nameUser = $_POST['nameUser'];
    $options = array(
        'cost' => 12
    );
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    // Start connection with the database 
    try {
        include_once "functions/functions.php";
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
        echo "Error: " . $th->getMessage();
    }

    // Send a response of a successful operation
    echo json_encode($response);
} elseif (isset($_POST["login-admin"])) {
    echo json_encode($_POST);
} else {
    header("Location: crear-admin.php");
    exit();
}

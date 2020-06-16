<?php
include_once "functions/functions.php";

if (isset($_POST["login-admin"])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Start connection with the database 
    try {
        $stmt = $conn->prepare("SELECT * FROM admins WHERE user =?;");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($id, $userDB, $nameUserDB, $passwordDB, $editedAdmin);
        if ($stmt->affected_rows) {
            $exist = $stmt->fetch();
            if ($exist) {
                if (password_verify($password, $passwordDB)) {
                    session_start();
                    $_SESSION['USER'] = $user;
                    $_SESSION['NAME'] = $nameUserDB;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    $_SESSION['EXPIRED'] = false;
                    $response = array(
                        'response' => 'success',
                        'name' => $nameUserDB
                    );
                } else {
                    $response = array(
                        'response' => 'error',
                    );
                }
            } else {
                $response = array(
                    'response' => 'error',
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        $response = array(
            'response' => 'error',
            'message' => $th->getMessage()
        );
    }
    // Send response
    echo json_encode($response);
}

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Config/ConnectionManager.php';

function login($expediente, $nip) {
    $conn = db_connect();
    $hashedNip = hash('sha256', $nip);
    
    $stmt = $conn -> prepare("SELECT * FROM uaq_alumnos_users WHERE expediente = ? AND nip = ?");
    $stmt -> bind_param("ss", $expediente, $hashedNip);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result -> num_rows == 1){

        session_start();

        $row = $result -> fetch_object();

        //echo "Login successful"
        $_SESSION['isLogged'] = true;
        $_SESSION['role'] = $row -> rol_id;

        header('Location: index.php');

        //echo $_SESSION['role'];
    } 
    else{
        $_SESSION['isLogged'] = false;
        echo "Invalid expediente or NIP";
    }

    $conn -> close();
}

function logout(){
    // We start the session
    session_start();

    // We remove all the session vars
    $_SESSION = array();

    // Destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    // Destroy the session
    session_destroy();
    header('Location: index.php');
}


    
?>
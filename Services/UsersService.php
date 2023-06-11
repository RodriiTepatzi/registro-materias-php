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
    session_abort();
    session_destroy();
}


    
?>
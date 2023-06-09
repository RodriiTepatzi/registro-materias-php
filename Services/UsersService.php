<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/alumnos/Config/ConnectionManager.php';

function login($expediente, $nip) {
    $conn = db_connect();
    $hashedNip = hash('sha256', $nip);
    
    $stmt = $conn->prepare("SELECT * FROM uaq_alumnos_users WHERE expediente = ? AND nip = ?");
    $stmt->bind_param("ss", $expediente, $hashedNip);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1){
        echo "Login successful";
    } 
    else{
        echo "Invalid expediente or NIP";
    }

    $conn->close();
}


    
?>
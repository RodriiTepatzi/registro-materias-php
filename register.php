<?php
    define('DOCUMENT_ROOT', dirname(__FILE__));
    require_once  DOCUMENT_ROOT . '/alumnos/Config/Connection.php';

    $conn = dbConnect();

    $expediente = $_POST['expediente'];
    $nip = $_POST['nip'];
    $semestre = $_POST['semestre'];
    $calificacion_general = $_POST['calificacion_general'];
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $foto = $_POST['foto'];

    $hashedNip = hash('sha256', $nip);

    $sql = "INSERT INTO uaq_alumnos_users (expediente, nip, semestre, calificacion_general, nombre_completo, email, foto) 
            VALUES ('$expediente', '$hashedNip', $semestre, $calificacion_general, '$nombre_completo', '$email', '$foto')";

    if ($conn -> query($sql) === TRUE) {
        echo "Creado con exito";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn -> close();
?>

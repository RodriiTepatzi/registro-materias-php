<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include $_SERVER['DOCUMENT_ROOT'] . '/alumnos/Services/UsersService.php';

    $expediente = $_POST['expediente'];
    $nip = $_POST['nip'];

    login($expediente, $nip);

?>
<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/enums/Exceptions.php';

function validateException($exception) {
    if (!empty(getExceptionName($exception))) {
        $reflection = new ReflectionClass(Exceptions::class);
        $constants = $reflection->getConstants();

        foreach ($constants as $name => $value) {
            if ($value === $exception && $name === 'WrongCredentials') {
                return 'prueba';
            }
        }
    }

    return 'a';
}

?>
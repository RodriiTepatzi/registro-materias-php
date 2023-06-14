<?php

    enum Exceptions{
        case WrongCredentials;
    }

    function getExceptionName($enumValue) {
        $reflection = new ReflectionClass($enumValue);
        $constants = $reflection->getConstants();
        
        foreach ($constants as $name => $value) {
            if ($value === $enumValue) {
                return $name;
            }
        }
        
        return null;
    }


    function isValidException($value) {
        $reflection = new ReflectionClass(Exceptions::class);
        $constants = $reflection->getConstants();
        
        return in_array($value, $constants);
    }
?>
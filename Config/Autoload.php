<?php

function autoloader($className)
{
    // Replace with the base directory of your classes
    $baseDir = __DIR__ . '/Classes/';

    // Convert the namespace separators to directory separators
    $className = str_replace('\\', '/', $className);

    // Build the path to the class file
    $filePath = $baseDir . $className . '.php';

    // Check if the class file exists and include it
    if (file_exists($filePath)) {
        require_once $filePath;
    }
}

spl_autoload_register('autoloader');

?>
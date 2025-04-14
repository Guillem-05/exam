<?php
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/../clases/Connection.php' . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
?> 
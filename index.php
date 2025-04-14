<?php

require_once '/exam2/clases/Connection.php';
require_once '../clases/Lamp.php';
require_once '../clases/Lighting.php';
require_once __DIR__ . '/autoload.php';

// Crear una instancia de la clase Lighting
$lighting = new Lighting();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Validar 
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']); // Convertir el ID a entero
        $lamp = $lighting->getLampById($id); // Obtener la lámpara por ID
        if ($lamp) {
            echo json_encode($lamp); 
        } else {
            echo json_encode(['mensaje' => 'Lámpara no encontrada']); 
        }
    } else {
        $lamps = $lighting->getAllLamps();
        echo json_encode($lamps);
    }
}
?>
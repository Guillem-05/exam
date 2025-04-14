<?php

$conexion = new mysqli("localhost", "usuario", "contraseña", "stadium");


if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

// Obtener el ID desde la URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar que el ID sea válido
if ($id > 0) {
   
    $sql = "UPDATE tabla SET estado = NOT estado WHERE id = $id";
    if ($conexion->query($sql) === TRUE) {
        echo "El estado del ID $id ha sido cambiado.";
    } else {
        echo "Error al cambiar el estado: " . $conexion->error;
    }
} else {
    echo "ID no válido.";
}

// Cerrar la conexión
$conexion->close();

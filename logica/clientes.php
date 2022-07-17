<?php

include '../database/db.php';
$consulta = 'SELECT * FROM "CLIENTES"';
# Preparar sentencia e indicar que vamos a usar un cursor
$clientes = $base_de_datos->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
# Ejecutar sin parámetros+
$clientes->execute();

session_start();
?>
<?php

include '../database/db.php';

$consulta = "SELECT peliculas.idpelicula,peliculas.titulo,
            estudios.nombreestudio, peliculas.fechainclusion
            FROM peliculas
            LEFT  JOIN estudios ON peliculas.idestudio = estudios.idestudio";

# Preparar sentencia e indicar que vamos a usar un cursor
$peliculas = $base_de_datos->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
# Ejecutar sin parámetros
$peliculas->execute();

# TRAE EL SELECT DE ESTUDIOS PARA AGREGAR PELICULAS
$consulta2 = "SELECT * FROM estudios";
# Preparar sentencia e indicar que vamos a usar un cursor
$desplegables = $base_de_datos->prepare($consulta2, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
# Ejecutar sin parámetros
$desplegables->execute();


?>
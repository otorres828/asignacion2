<?php


$host="localhost";
$puerto="5432";
$usuario= "postgres";
$clave= "26269828";
$nombre_basededatos= "asignacion-2";
try {
    $base_de_datos = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombre_basededatos",$usuario,$clave);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ups, parece que ocurrio un error con la base de datos: " . $e->getMessage();
}
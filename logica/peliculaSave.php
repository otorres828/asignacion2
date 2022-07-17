<?php
include '../database/db.php';
// NUEVA PELICULA
if (isset($_POST['nuevaPelicula'])) {
    if (isset($_POST['titulo']) && isset($_POST['idestudio']) && isset($_POST['fechainclusion'])) {
            $titulo = $_POST['titulo'];
            $idestudio = $_POST['idestudio'];
            $fechainclusion= $_POST['fechainclusion'];

            $sentencia = $base_de_datos->prepare("INSERT INTO peliculas(titulo, idestudio,fechainclusion) VALUES (?, ?, ?);");
            $resultado = $sentencia->execute([$titulo, $idestudio,$fechainclusion]); # Pasar en el mismo orden de los ?
            if ($resultado === true) {
                header("Location: ../Admin/peliculas.php");
            } else {
                echo "Algo salió mal";
            }
            
    }
}

// MODIFICAR ACTOR
if (isset($_POST['modificarPelicula'])) {  
    if (isset($_POST['titulo']) && isset($_POST['idestudio']) && isset($_POST['fechainclusion']) && isset($_POST['idpelicula']) ) {
        $titulo = $_POST['titulo'];
        $idestudio = $_POST['idestudio'];
        $fechainclusion= $_POST['fechainclusion'];
        $idpelicula=$_POST['idpelicula'];
        $sentencia = $base_de_datos->prepare("UPDATE peliculas SET titulo = ?, idestudio = ? ,fechainclusion = ? WHERE idpelicula = ?");
        $resultado = $sentencia->execute([$titulo, $idestudio, $fechainclusion,$idpelicula]); # Pasar en el mismo orden de los ?
        if ($resultado === true) {
           header("Location: ../Admin/peliculas.php");
        } else {
            echo "Algo salió mal";
        } 
    }
}

// ELIMINAR PELICULA
    if(isset($_GET['idpelicula'])){
        $idpelicula=$_GET['idpelicula'];

        $sentencia = $base_de_datos->prepare("DELETE FROM peliculas WHERE idpelicula = ?;");
        $resultado = $sentencia->execute([$idpelicula]);
        if ($resultado === true) {
            header("Location: ../Admin/peliculas.php");
        } else {
            echo "Algo salió mal";
        }
    }


?>

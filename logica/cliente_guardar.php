<?php
include '../database/db.php';

// NUEVO CLIENTE
if (isset($_POST['nuevocliente'])) {
    if (isset($_POST['RIFCliente']) && isset($_POST['Cedula'])
                                && isset($_POST['NombreC'])
                                && isset($_POST['DireccionC'])
                                && isset($_POST['TelefonoC'])
                                && isset($_POST['FechaAfiliacion']) 
                                && isset($_POST['Email'])) {
        $RIFCliente = $_POST['RIFCliente'];
        $Cedula = $_POST['Cedula'];
        $NombreC = $_POST['NombreC'];
        $DireccionC = $_POST['DireccionC'];
        $TelefonoC = $_POST['TelefonoC'];
        $StatusC = "A";
        $Email = $_POST['Email'];
        $FechaAfiliacion = $_POST['FechaAfiliacion'];
           
           $sentencia = $base_de_datos->prepare('INSERT INTO "CLIENTES" ("RIFCliente", "Cedula", "NombreC", "DireccionC", "TelefonoC", "StatusC", "FechaAfiliacion", "Email")
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

        $resultado = $sentencia->execute([$RIFCliente, $Cedula,$NombreC,$DireccionC,$TelefonoC,$StatusC,$FechaAfiliacion,$Email]); # Pasar en el mismo orden de los ?
        if ($resultado === true) {
            session_start();
            $_SESSION['exito']="Registro creado con exito";        
            header("Location: ../vistas/clientes.php");
        } else {
            echo "Algo salió mal";
        }          
    }
}

// MODIFICAR CLIENTE
if (isset($_POST['actualizarcliente'])) {
    if (isset($_POST['RIFCliente']) && isset($_POST['Cedula'])
                                && isset($_POST['NombreC'])
                                && isset($_POST['DireccionC'])
                                && isset($_POST['TelefonoC'])
                                && isset($_POST['FechaAfiliacion']) 
                                && isset($_POST['Email'])) {
        $RIFCliente = $_POST['RIFCliente'];
        $Cedula = $_POST['Cedula'];
        $NombreC = $_POST['NombreC'];
        $DireccionC = $_POST['DireccionC'];
        $TelefonoC = $_POST['TelefonoC'];
        $StatusC =$_POST['StatusC'];
        $Email = $_POST['Email'];
        $FechaAfiliacion = $_POST['FechaAfiliacion'];
    
        session_start();
        if($_POST['FechaDesafiliacion']==""){
            $sentencia = $base_de_datos->prepare('UPDATE "CLIENTES" SET "Cedula"=?, "NombreC"=?, "DireccionC"=?, "TelefonoC"=?, "StatusC"=?, "FechaAfiliacion"=?, "Email"=?
                                               WHERE "RIFCliente"=?');
    
            $resultado = $sentencia->execute([$RIFCliente, $Cedula,$NombreC,$DireccionC,$TelefonoC,$StatusC,$FechaAfiliacion,$Email,$RIFCliente]); # Pasar en el mismo orden de los ?
        }else{
            $FechaDesafiliacion = $_POST["FechaDesafiliacion"];
            if($FechaDesafiliacion<$FechaAfiliacion){
                $_SESSION['error']="La fecha de des afiliacion no puede ser menor a la fecha de afiliacion";        
                // header("Location: ../vistas/clientes.php"); 
            }else{
                if($StatusC=='A'){
                    $_SESSION['error']="No se puede tener una fecha de desafiliacion con un estatus activo";        
                    header("Location: ../vistas/clientes.php");
                }else{
                    $sentencia = $base_de_datos->prepare('UPDATE "CLIENTES" SET "Cedula"=?, "NombreC"=?, "DireccionC"=?, "TelefonoC"=?, "StatusC"=?, "FechaAfiliacion"=?,"FechaDesfiliacion"=? "Email"=?
                    WHERE "RIFCliente"='.$RIFCliente);
        
                    $resultado = $sentencia->execute([$Cedula,$NombreC,$DireccionC,$TelefonoC,$StatusC,$FechaAfiliacion,$FechaDesafiliacion,$Email,$RIFCliente]); 

                }
            }

        }

        if ($resultado === true) {
            $_SESSION['exito']="Se actualizo creado con exito";        
            header("Location: ../vistas/clientes.php");
        } else {
            echo "Algo salió mal";
        }          
    }else{
        session_start();
        $_SESSION['error']="faltan datos por llenar";        
        header("Location: ../vistas/clientes.php");
    }
}

// ELIMINAR CLIENTE
if(isset($_GET['RIFCliente'])){
    $RIFCliente=$_GET['RIFCliente'];

    $sentencia = $base_de_datos->prepare('DELETE FROM "CLIENTES" WHERE "RIFCliente" = ?;');
    $resultado = $sentencia->execute([$RIFCliente]);
    if ($resultado === true) {
        session_start();
        $_SESSION['exito']="Se elimino el cliente con exito";        
        header("Location: ../vistas/clientes.php");
    } else {
        echo "Algo salió mal";
    }
}

?>


<?php include '../logica/clientes.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
    <title>Asignacion 2 - Actores</title>

</head>

<body>  

    <header >
    <div class="wrapper nab">
        <nav class="navbar navbar-expand-lg  navbar-dark bg-dark ">
            <div class="container">
                <div type="button" class="bg-info p-2 font-bold text-white">
                    <span>Ricardo Colina</span>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href=".peliculas.php">Facturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Clientes</a>
                    </li>
                </ul>
            </div>
        </nav>     
    </div>
    </header>

    <div class="container p-5">
        <div class="row">
        <div class="col card px-5">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="example">
                        <div  class = "mb-3" >
                            <div  class = "btn btn-primary "  data-bs-toggle="modal" data-bs-target="#crear" data-bs-whatever="@mdo" > Crear Cliente </div>
                        </div>
                        <?php include '../modales/modal_crearcliente.php'; ?>

                        <?php if (isset($_SESSION['exito'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION['exito']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['exito']);
                        session_destroy(); }?>

                        <?php if (isset($_SESSION['error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION['error']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['error']);
                        session_destroy(); }?>
                        <thead class="thead-light">
                            <tr>
                                <th>Rif</th>
                                <th>cedula</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Fecha Afiliacion</th>
                                <th>Fecha Des-Afiliacion</th>
                                <th>Estatus</th>
                                <th>correo electronico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clientes as $cliente){ ?>
                                <tr>
                                    <td><?php echo $cliente['RIFCliente'] ?></td>
                                    <td><?php echo $cliente['Cedula'] ?></td>
                                    <td><?php echo $cliente['NombreC'] ?></td>
                                    <td><?php echo $cliente['DireccionC'] ?></td>
                                    <td><?php echo $cliente['TelefonoC'] ?></td>
                                    <td><?php echo $cliente['FechaAfiliacion'] ?></td>
                                    <td class="font-bold text-danger"><?php if($cliente['FechaDesafiliacion']==NULL){
                                        echo "No Posee"; 
                                    } ?></td>
                                    <td><?php echo $cliente['StatusC'] ?></td>
                                    <td><?php echo $cliente['Email'] ?></td>
                                   
                                    <td width="10px" class="d-flex">
                                        <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editar<?=$cliente['RIFCliente'];?>" data-bs-whatever="@mdo" >Editar</a>
                                            <a class="dropdown-item" href="../logica/cliente_guardar.php?RIFCliente=<?=$cliente['RIFCliente']?>">Eliminar</a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php include '../modales/modal_editarcliente.php'; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include '../logica/scrip.php';?>

</body>


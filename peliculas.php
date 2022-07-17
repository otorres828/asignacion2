

<?php include 'logica/logpelicula.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/img/favicon/favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
    <title>Asignacion 2 - Actores</title>

</head>

<body>

     <?php  include 'nabvar/nav.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col card px-5">
                <div class="table-responsive py-4">
                    <table class="table table-flush w-full mb-5" id="example">
                        <div  class = "mb-3" >
                            <div  class = "btn btn-primary "  data-bs-toggle="modal" data-bs-target="#crear" data-bs-whatever="@mdo" > Agregar Pelicula </div>
                        </div>
                        <?php include '../modales/modalAgregarPelicula.php'; ?>

                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Titulo</th>
                                <th>Estudio</th>
                                <th>Fecha de Inclusion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($peliculas as $pelicula){ ?>
                                <tr>
                                    <td><?php echo $pelicula['idpelicula'] ?></td>
                                    <td><?php echo $pelicula['titulo'] ?></td>
                                    <td><?php echo $pelicula['nombreestudio'] ?></td>
                                    <td><?php echo $pelicula['fechainclusion'] ?></td>
                                    <td width="10px" class="d-flex">
                                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $pelicula['idpelicula']?>" data-bs-whatever="@mdo">Editar 📝</a>
                                        <form class="destroy"action="../logica/peliculaSave.php?idpelicula=<?php echo $pelicula['idpelicula']?>" method="POST">
                                            <button name="eliminarPelicula"type="submit"class="btn btn-danger ml-1">Eliminar 🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php include '../modales/modalEditarPelicula.php'; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include '../logica/scrip.php';?>
</body>
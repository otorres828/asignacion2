<?php
    # TRAE EL SELECT DE ESTUDIOS PARA EDITAR PELICULAS

    $consulta3 = "SELECT * FROM estudios";
    # Preparar sentencia e indicar que vamos a usar un cursor
    $desplegables2 = $base_de_datos->prepare($consulta3, [
        PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
    ]);
    # Ejecutar sin parámetros
    $desplegables2->execute();
?>

<div class="modal fade" id="edit<?php echo $pelicula['idpelicula']?>" tabindex="-1" aria-labelledby="edit<?php $actor['idactor']?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Pelicula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="../logica/peliculaSave.php" method="POST" enctype="multipart/form-data">                                                       
                        <input type="text"  name="idpelicula" class="form-control" value="<?php echo $pelicula['idpelicula']?>" hidden>
                            <div class="form-group">
                                <label >Titulo de la Pelicula</label>
                                <input type="text"  name="titulo" class="form-control" value="<?php echo $pelicula['titulo']?>"required >
                            </div>
                            <div class="form-group">
                                <label >Estudio </label>
                                <select name="idestudio" class="form-control" required>
                                    <option value="">Escoga un Estudio</option> 
                                    <?php foreach($desplegables2 as $desplegable){  ?> 
                                        <option value="<?php echo $desplegable['idestudio']?>"><?php echo $desplegable['nombreestudio']?></option>
                                    <?php }?>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label >Fecha de Inclusion</label>
                                <input  type="date" name="fechainclusion" class="form-control" value="<?php echo $pelicula['fechainclusion']?>"required >  
                            </div>
                            <div class="d-flex justify-content-end align-items-baseline">
                                <button name="modificarPelicula" type="submit" class="btn btn-success" required>Actualizar</button>
                                <button type="button"  class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>  
                      
            </div>
        </div>
    </div>
</div>
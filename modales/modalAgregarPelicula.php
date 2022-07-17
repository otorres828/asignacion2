<div class="modal fade" id="crear" tabindex="-1" aria-labelledby="crear" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Pelicula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="../logica/peliculaSave.php" method="POST" enctype="multipart/form-data">                                                       
                            <div class="form-group">
                                <label >Titulo de la Pelicula</label>
                                <input type="text"  name="titulo" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label >Estudio</label>
                                <select name="idestudio" class="form-control" required>
                                    <option value="">Escoga un Estudio</option> 
                                    <?php foreach($desplegables as $desplegable){  ?> 
                                        <option value="<?php echo $desplegable['idestudio']?>"><?php echo $desplegable['nombreestudio']?></option>
                                    <?php }?>
                                </select> 
                              
                            </div>
                            <div class="form-group">
                                <label >Fecha de Inclusion</label>
                                <input  type="date" name="fechainclusion" class="form-control" required >  
                            </div>
                            <div class="d-flex justify-content-end align-items-baseline">
                            <button name="nuevaPelicula" type="submit" class="btn btn-success" required>Nuevo</button>
                                <button type="button"  class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
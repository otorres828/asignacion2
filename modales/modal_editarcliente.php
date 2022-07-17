<div class="modal fade" id="editar<?=$cliente['RIFCliente']?>" tabindex="-1" aria-labelledby="editar<?=$cliente['RIFCliente']?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="../logica/cliente_guardar.php" method="POST" enctype="multipart/form-data">                                                       
                            <div class="form-group">
                                <label >Rif</label>
                                <input type="number"  name="RIFCliente" class="form-control" required value="<?=$cliente['RIFCliente']?>"readonly >
                            </div>
                            <div class="form-group">
                                <label >Cedula</label>
                                <input type="number"  name="Cedula" class="form-control" required value="<?=$cliente['Cedula']?>" >  
                            </div>
                            <div class="form-group">
                                <label >Nombre</label>
                                <input type="text"  name="NombreC" class="form-control" required value="<?=$cliente['NombreC']?>" >  
                            </div>
                            <div class="form-group">
                                <label >Direccion</label>
                                <input type="text"  name="DireccionC" class="form-control" required value="<?=$cliente['DireccionC']?>" >  
                            </div>
                            <div class="form-group">
                                <label >Telefono</label>
                                <input type="number"  name="TelefonoC" class="form-control" required value="<?=$cliente['TelefonoC']?>" >  
                            </div>
                            <div class="form-group">
                                <label >Fecha de Afiliacion</label>
                                <input type="date"  name="FechaAfiliacion" class="form-control" required  value="<?=$cliente['FechaAfiliacion']?>">  
                            </div>
                            <div class="form-group">
                                <label >Fecha de DesAfiliacion</label>
                                <input type="date"  name="FechaDesafiliacion" class="form-control"  value="<?=$cliente['FechaDesafiliacion']?>  value="<?=$cliente['FechaAfiliacion']?>">  
                            </div>
                            <div class="form-group">
                                <label >Estatus</label>
                                <select  name="StatusC" class="form-control" required value="<?=$cliente['StatusC']?>"> 
                                <option value="A">Activo</option>
                                <option value="S">Suspendido</option>
                                <option value="M">Moroso</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label >Correo Electronico</label>
                                <input type="email"  name="Email" class="form-control" required  value="<?=$cliente['Email']?>">  
                            </div>
                            <div class="d-flex justify-content-end align-items-baseline">
                            <button name="actualizarcliente" type="submit" class="btn btn-success" required>Actualizar</button>
                                <button type="button"  class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
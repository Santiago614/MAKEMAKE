<div class="modal fade" id="eliminarPubliModal-<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="../../../Controllers/php/users/publicaciones" method="post">
            <input type="hidden" name="eliminarPublicacion">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro quieres eliminar esta publicación?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Eliminar" para eliminar la publicación, esta acción no se podrá deshacer.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Actualizar Publicación -->
<div class="modal fade" id="actualizarPubliModal-<?= $data['id'] ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Actualizar Publicación</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form method="POST" action="../../../Controllers/php/users/publicaciones">
                    <!-- Actualiar dirección -->
                    <input type="hidden" name="actualizarPublicacion">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">

                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Ej: Madre, trabajo..." value="<?= $data['nombre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputDireccion">Descripción</label>
                        <input type="text" class="form-control" id="inputDireccion" name="descripcion" placeholder="Ej: Cra 30" value="<?= $data['descripcion'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputCosto">Costo</label>
                        <input type="number" class="form-control" id="inputCosto" name="costo" placeholder="Ej: 345000" value="<?= $data['precio'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputStock">Cant</label>
                        <input type="number" class="form-control" id="inputStock" name="stock" placeholder="Ej: 3,4,2" value="<?= $data['cantidad'] ?>">
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary submitBtn">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form id="actualidarDatos">
  <div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Modificar Lote:</h4>
        </div>
        <div class="modal-body">
          <div id="datos_ajax"></div>
          <div class="form-group">
            <label for="codigo" class="control-label">Clave Lote:</label>
            <input type="text" class="form-control" id="codigo" name="codigo" readonly required maxlength="6">
            <input type="hidden" class="form-control" id="id" name="id">
          </div>
          <div class="form-group">
            <label for="nombre" class="control-label">Nombre Lote:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="20">
          </div>
          <div class="form-group">
            <label for="moneda" class="control-label">Area:</label>
            <input type="text" class="form-control" id="moneda" name="moneda" readonly required maxlength="6">
          </div>
          <div class="form-group">
            <label for="capital" class="control-label">Precio:</label>
            <input type="text" class="form-control" id="capital" name="capital" required maxlength="7"> 
          </div>
          <div class="form-group">
            <label for="continente" class="control-label">IdManzana:</label>
            <input type="text" class="form-control" id="continente" name="continente" readonly required maxlength="5">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>
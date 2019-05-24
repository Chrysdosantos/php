<form id="guardarDatos">
  <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Agregar Cliente</h4>
        </div>
        <div class="modal-body">
  			  <div id="datos_ajax_register"></div>
            <div class="form-group">
              <label for="nombre" class="control-label">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre"  maxlength="50">
  		      </div>
  		      <div class="form-group">
              <label for="paterno" class="control-label">ApellidoP:</label>
              <input type="text" class="form-control" id="paterno" name="paterno"  maxlength="50">
            </div>
  		      <div class="form-group">
              <label for="materno" class="control-label">ApellidoM:</label>
              <input type="text" class="form-control" id="materno" name="materno"  maxlength="50">
            </div>
  		      <div class="form-group">
              <label for="ciudad" class="control-label">Ciudad:</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="50"> 
            </div>
            <div class="form-group">
              <label for="colonia" class="control-label">Colonia:</label>
              <input type="text" class="form-control" id="colonia" name="colonia" maxlength="100">
            </div>
            <div class="form-group">
              <label for="calle" class="control-label">Calle:</label>
              <input type="text" class="form-control" id="calle" name="calle" maxlength="50">
            </div>
            <div class="form-group">
              <label for="numero" class="control-label">Numero:</label>
              <input type="text" class="form-control" id="numero" name="numero" maxlength="45">
            </div>
            <div class="form-group">
              <label for="celular" class="control-label">Celular:</label>
              <input type="text" class="form-control" id="celular" name="celular" maxlength="12">
            </div>
            <div class="form-group">
              <label for="telcasa" class="control-label">Telefono Casa:</label>
              <input type="text" class="form-control" id="telcasa" name="telcasa" maxlength="30"> 
            </div>
            <div class="form-group">
              <label for="fnacimiento" class="control-label">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="fnacimiento" name="fnacimiento">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>
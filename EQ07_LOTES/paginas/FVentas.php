 <link rel="stylesheet" type="text/css" href="../Css/Estilos2.css">
  
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<?php 
  include('../php/conexion.php');
  $consulta="SELECT * FROM CLIENTES";
  $resultado=mysqli_query($conexion,$consulta);
?>


<?php
  echo '<div id="forVentas">
          <div class="contenedor">
            <header>
              <ul class="menu">
               <li><a href="index.php">Inicio</a></li>
                <li><a href="phpC/IClientes.php">Clientes</a></li>
               <li><a href="phpL/ILotes.php">Lotes</a></li>
              </ul>
              <br>
              <h1>
                Realizar Venta 
              </h1>
            </header>
            <div i>
              <div class="wrap">
                <form method="POST" action="php/realizarVenta.php"  >
                  Fecha:
                  <input type="text"   readonly class="form-control" name="Fecha" placeholder="Fecha"  value="'. $fecha = date('Y-m-j').'">     <br>
                  Pago Inicial:
                  <input type="text"  class="form-control" name="PagoInicial" placeholder="Pago Inicial" value="0">
                  Clave Lote:
                  <input type="text" required=""   readonly class="form-control" name="ClaveLote" placeholder="Clave Lote" value="'.$_GET['pos'].'">
                  Cliente: <br>
                  <select style="width: 480px; height:42px;" name="IdCliente"   >
                  <option   value="0">seleccione cliente</option>';
                  while ($fila=mysqli_fetch_array($resultado)) 
                  {
                    echo '<option  value="'.$fila['IdCliente'].'">'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].' </option> '; 
                  } 
                  echo '</select> <p></p>
                  <br>
                  <input type="submit" value="Guardar">';  ?>
                  <button id="reset" type="button" onClick="location.href='index.php'">Cancelar</button>
<?php
    echo '   
                </form>
              </div>
            </div>
            <footer>
              <div class="separador"></div>
            </footer>
          </div>
        </div>';
?>
  
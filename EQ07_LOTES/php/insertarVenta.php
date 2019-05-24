<link rel="stylesheet" type="text/css" href="../Css/Estilos2.css">
<link rel="stylesheet" type="text/css" href="../Css/EstilosFormulario2.css">

<?php
  include('conexion.php');
  $consulta='SELECT * FROM LOTES WHERE ClaveLote="'.$_GET['pos'].'" ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
?>
<?php
  while($fila=mysqli_fetch_array($resultado))
	{
		echo '<div id="forVentas">
            <div class="contenedor">
              <header>
                <ul class="menu">
                  <li><a href="../index.html">Inicio</a></li>
                  <li><a href="../paginas/IClientes.php">Clientes</a></li>
                  <li><a href="IVentas.html">Ventas</a></li>
                  <li><a href="IDetalles-Ventas.html">Detalle Ventas</a></li>
                </ul>
                <br>
                <h1>
                  Realizar Venta
                </h1>
              </header>
              <div i>
                <div class="wrap">
                  <form method="POST" action="../php/editarCliente.php" >
                    IdVentas:
                    <input type="text" class="form-control" name="IdVentas" placeholder="IdVentas" value="">
                    Fecha:
                    <input type="text" class="form-control" name="Fecha" placeholder="Fecha" value=""><br>
                    Pago Inicial:
                    <input type="text" class="form-control" name="PInicial" placeholder="Pago Inicial" value="">
                    Clave Lote:
                    <input type="text" class="form-control" name="CLote" placeholder="Clave Lote" value="0001">
                    IdCliente:
                    <input type="text" class="form-control" name="IdCliente" placeholder="IdCliente" value="">
                    <input type="submit" value="Guardar">
                  </form>
                </div>
              </div>
              <footer>
                <div class="separador"></div>
              </footer>
            </div>
          </div>';
  }
?>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<?php
  include('conexion.php');
  $consulta='SELECT (COUNT(DETALLES_PAGOS.NumPago))+1 AS NumPAGO
             FROM LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
             WHERE CLIENTES.IdCliente=VENTAS.IdCliente 
             AND MANZANAS.IdManzana=LOTES.IdManzana 
             AND VENTAS.ClaveLote=LOTES.ClaveLote 
             AND  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
             AND LOTES.ClaveLote="'.$_GET['pos'].'"';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
  while ($fila=mysqli_fetch_array($resultado))
  {
    echo '<input type="text" name="NumPago" readonly class="form-control" name="IdVentas" placeholder="NumPago" 
          value="'.$fila['NumPAGO'].'">';
  }
?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<?php
  include('conexion.php');
  $consulta=' SELECT COUNT(DETALLES_PAGOS.Abono) AS NUMPAGOS,
              ((LOTES.Precio)- VENTAS.PagoInicial)/12 AS pagoMensual
              FROM LOTES,VENTAS,DETALLES_PAGOS
              WHERE LOTES.ClaveLote=VENTAS.ClaveLote 
              AND VENTAS.IdVentas=DETALLES_PAGOS.IdVentas 
              AND LOTES.ClaveLote="'.$_GET['pos'].'"  ';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());

  while ($fila=mysqli_fetch_array($resultado))
  {
    $formato= number_format($fila['pagoMensual'], 2, '.', '');
    echo '<input type="text" readonly class="form-control" name="Abono" placeholder="NumPago" value="'.$formato.'">';
  }
?>
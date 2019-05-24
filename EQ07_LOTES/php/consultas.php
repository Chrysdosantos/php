<?php
  include('php/conexion.php');
  $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  WHERE ClaveLote="MO1L1"';
  $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
  $fila=mysqli_fetch_array($resultado);
  $consulta1='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
              ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 AS mensualidad,
              SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
              LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
              COUNT(DETALLES_PAGOS.NumPago) AS NumPAGO, 
              12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
              FROM LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
              WHERE CLIENTES.IdCliente=VENTAS.IdCliente 
              AND MANZANAS.IdManzana=LOTES.IdManzana 
              AND VENTAS.ClaveLote=LOTES.ClaveLote 
              AND DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
              AND LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
  $resultado1=mysqli_query($conexion,$consulta1) or die(mysqli_error());
  $fila1=mysqli_fetch_array($resultado1); 
  $formato1= number_format($fila1['mensualidad'], 2, '.', '');

  echo '<div id="flotante" >
          <table border="2px" >
            <tr>
              <td>AREA</td>
              <td>PRECIO</td>
              <td>Estado</td>
              <td>NOMBRE COMPRADOR</td>
              <td>PAGO INICIAL</td>
              <td>MENSUALIDAD</td>
              <td>ABONADO</td>
              <td>ADEUDO</td>
              <td>PAGOS REALIZADOS</td> 
              <td>PAGOS RESTANTES</td> 
            </tr>
            <tr>
              <td>'.$fila['Area'].'m<sup>2</sup></td>
              <td>'.$fila['Precio'].' </td>
              <td>'.$fila['Estado'].' </td>
              <td> '.$fila1['Nombre'].''.$fila1['Paterno'].''.$fila1['Materno'].' </td>
              <td> '.$fila1['PagoInicial'].'  </td>
              <td> '.$formato1.' </td>
              <td>'.$fila1['ABONADO'].'  </td>
              <td>'.$fila1['adeudo'].' </td>
              <td>'.$fila1['NumPAGO'].' </td> 
              <td>'.$fila1['pagosRes'].'</td>
            </tr>';
?>
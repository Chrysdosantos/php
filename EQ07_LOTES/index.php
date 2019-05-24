<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
  <link rel="stylesheet" type="text/css" href="Css/Estilos2.css">
  <link rel="stylesheet" type="text/css" href="Css/EstilosFormulario2.css">
  <meta charset="utf-8">
  <?php include('php/estilosTerrenos.php'); ?>
  <?php include('php/estilosManzanas.php'); ?>
</head>
<div id="forVentas"></div>
<div id="forPagos"></div>
<body>
    <div  id="principal"  class="contenedor">
        <header>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="phpC/IClientes.php">Clientes</a></li>
                <li><a href="phpL/ILotes.php">Lotes</a></li>
            </ul>
            <br>
            <h1>Venta de Terrenos</h1>
        </header>
        <div id="contenedor">            
            <div id="M01">
                <div >
                    <span   onmouseover="showdiv(event);" onmousemove="showdiv(event);" onmouseout="javascript:document.getElementById('flotante').style.display='none';"> <center> Manzana 01</center></span> 
                </div>
                <?php  
                
                include('php/conexion.php');
                $consulta=' SELECT Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M01" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo' <div id="flotante" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                   echo'    <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                    echo'</table>
                       </div>'
            ?> 
        
        <?php
            include('php/conexion.php');
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM  LOTES  where Clavelote="M01L01"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        COUNT(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                echo '">';
                if ($fila['Estado']=="Disponible")
                { 
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1  </button>';
                }
                else
                {    
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                }     
            echo' </div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES where Clavelote="M01L02"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana  
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2  </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                }   
            echo '</div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M01L03"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
             
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '">';
                if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3  </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                }
                     
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  LIMIT 8,1';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
               if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                }
                     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M01L05"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo '<div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                 if ($fila['Estado']=="Disponible")
                {
                      echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                }
                else
                {
                      echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    } 
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M01L06"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
              
            echo'<div  id="'.$fila['ClaveLote'].'"   title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }

                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> <a>  LOTE 6 </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                }     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES   where Clavelote="M01L07"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 7</button>';
                }
                else
                {
                       echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7</button> ';
                }     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   where Clavelote="M01L08"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 8 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                }     
            echo ' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado    FROM LOTES   where Clavelote="M01L09"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" FORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                }     
            echo '  </div>';

            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  where Clavelote="M01L10"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 10 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                }
                     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES  where Clavelote="M01L11"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 11 </button>';
                }
                else
                {
                   echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 11 </button> ';
                }
            echo '  </div>';
                
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES where Clavelote="M01L12"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 12</button>';
                }
                else
                {
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 12 </button> ';
                }     
            echo ' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado FROM LOTES  where Clavelote="M01L13"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }

                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button   onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 13</button>';
                }
                else
                {
                   echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 13</button> ';
                }
            echo ' </div>';

            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  where Clavelote="M01L14"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 14  </button>';
                }
                else
                {
                    echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 14</button> ';
                }     
            echo ' </div>';

        ?>
    </div>

        <div id="M02">
            <div >
               <span onmouseover="showdiv2(event);" onmousemove="showdiv2(event);" onmouseout="javascript:document.getElementById('flotante2').style.display='none';"> <center> Manzana 02</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta=' SELECT   Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M02" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante2" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                echo'   </table>
                    </div>'
           ?>   
 
        <?php
            include('php/conexion.php');
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM  LOTES  where Clavelote="M02L01"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        COUNT(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                echo '">';
                if ($fila['Estado']=="Disponible")
                { 
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1  </button>';
                }
                else
                {    
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                }     
            echo' </div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES where Clavelote="M02L02"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana  
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2  </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                }   
            echo '</div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M02L03"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
             
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '">';
                if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3  </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                }
                     
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M02L04"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
               if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                }
                     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M02L05"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo '<div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                 if ($fila['Estado']=="Disponible")
                {
                      echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                }
                else
                {
                      echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    } 
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M02L06"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
              
            echo'<div  id="'.$fila['ClaveLote'].'"   title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }

                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> <a>  LOTE 6 </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                }     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES   where Clavelote="M02L07"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 7</button>';
                }
                else
                {
                       echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7</button> ';
                }     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   where Clavelote="M02L08"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 8 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                }     
            echo ' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado    FROM LOTES   where Clavelote="M02L09"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" FORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                }     
            echo '  </div>';

            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  where Clavelote="M02L10"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 10 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                }
                     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES  where Clavelote="M02L11"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 11 </button>';
                }
                else
                {
                   echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 11 </button> ';
                }
            echo '  </div>';
                
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES where Clavelote="M02L12"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 12</button>';
                }
                else
                {
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 12 </button> ';
                }     
            echo ' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado FROM LOTES  where Clavelote="M02L13"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }

                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button   onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 13</button>';
                }
                else
                {
                   echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 13</button> ';
                }
            echo ' </div>';

            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  WHERE ClaveLote="M02L14"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:22px"> LOTE 14 </button>';
                }
                else
                {
                    echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 14 </button> ';
                }
            echo '  </div>';
        ?>

        </div>
        
        <div id="M03">
            <div >
                <span onmouseover="showdiv3(event);" onmousemove="showdiv3(event);" onmouseout="javascript:document.getElementById('flotante3').style.display='none';"> <center> Manzana 03</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M03" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante3" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                echo'   </table>
                    </div>'
           ?>   
        <?php
            include('php/conexion.php');
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM  LOTES  where Clavelote="M03L01"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        COUNT(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                echo '">';
                if ($fila['Estado']=="Disponible")
                { 
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1  </button>';
                }
                else
                {    
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                }     
            echo' </div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES where Clavelote="M03L02"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana  
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2  </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                }   
            echo '</div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M03L03"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
             
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '">';
                if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3  </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                }
                     
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M03L04"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
               if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                }
                     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M03L05"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo '<div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                 if ($fila['Estado']=="Disponible")
                {
                      echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                }
                else
                {
                      echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    } 
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M03L06"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
              
            echo'<div  id="'.$fila['ClaveLote'].'"   title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }

                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> <a>  LOTE 6 </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                }     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES   where Clavelote="M03L07"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 7</button>';
                }
                else
                {
                       echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7</button> ';
                }     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   where Clavelote="M03L08"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 8 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                }     
            echo ' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado    FROM LOTES   where Clavelote="M03L09"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" FORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                }     
            echo '  </div>';

            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  where Clavelote="M03L10"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 10 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                }
                     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES  where Clavelote="M03L11"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 11 </button>';
                }
                else
                {
                   echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 11 </button> ';
                }
            echo '  </div>';
                
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES where Clavelote="M03L12"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 12</button>';
                }
                else
                {
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 12 </button> ';
                }     
            echo ' </div>';         
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  WHERE ClaveLote="M03L13"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                   echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:22px"> LOTE 13  </button>';  
                }
                else
                {
                echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 13 </button> ';
                }
            echo '  </div>';
            
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  WHERE ClaveLote="M03L14"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                   echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:22px"> LOTE 14  </button>';  
                }
                else
                {
                echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 14 </button> ';
                }         
            echo '  </div>';   
        ?>

        </div>
        
        <div id="M04">
            <div >
                <span onmouseover="showdiv4(event);" onmousemove="showdiv4(event);" onmouseout="javascript:document.getElementById('flotante4').style.display='none';"> <center> Manzana 04</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M04" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante4" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                        while ( $fila=mysqli_fetch_array($resultado)) 
                        {
                        echo'<tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                        }         
                    echo'</table>
                    </div>'
            ?>    
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M03" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante3" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                echo'   </table>
                    </div>'
           ?>   
        <?php
            include('php/conexion.php');
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM  LOTES  where Clavelote="M04L01"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        COUNT(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                echo '">';
                if ($fila['Estado']=="Disponible")
                { 
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1  </button>';
                }
                else
                {    
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                }     
            echo' </div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES where Clavelote="M04L02"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana  
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'" title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2  </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                }   
            echo '</div>';
                 
                 
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M04L03"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
             
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '">';
                if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3  </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                }
                     
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M04L04"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
               if ($fila['Estado']=="Disponible")
                {
                    echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                }
                     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M04L05"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo '<div  id="'.$fila['ClaveLote'].'"   title=" 
                    INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    pago Inicio: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >';
                 if ($fila['Estado']=="Disponible")
                {
                      echo '<button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                }
                else
                {
                      echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    } 
            echo' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES    where Clavelote="M04L06"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
              
            echo'<div  id="'.$fila['ClaveLote'].'"   title="INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }

                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> <a>  LOTE 6 </button>';
                }
                else
                {
                    echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                }     
            echo '</div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES   where Clavelote="M04L07"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 7</button>';
                }
                else
                {
                       echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7</button> ';
                }     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   where Clavelote="M04L08"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }
                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 8 </button>';
                }
                else
                {
                    echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                }     
            echo ' </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado    FROM LOTES   where Clavelote="M04L09"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" FORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                }     
            echo '  </div>';

            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  where Clavelote="M04L10"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo' <div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 10 </button>';
                }
                else
                {
                    echo ' <button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                }
                     
            echo '  </div>';
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES  where Clavelote="M04L11"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 11 </button>';
                }
                else
                {
                   echo '  <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 11 </button> ';
                }
            echo '  </div>';
                
            $consulta='SELECT ClaveLote,Precio,Area,Estado   FROM LOTES where Clavelote="M04L12"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado); 
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and VENTAS.ClaveLote=LOTES.ClaveLote 
                        and DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                    echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                    echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px">LOTE 12</button>';
                }
                else
                {
                    echo ' <button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 12 </button> ';
                }     
            echo ' </div>';         
               
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  WHERE ClaveLote="M04L13"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                   echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:22px"> LOTE 13  </button>';  
                }
                else
                {
                echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 13 </button> ';
                }
            echo '  </div>';
            
            $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES  WHERE ClaveLote="M04L14"';
            $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
            $fila=mysqli_fetch_array($resultado);  
            $consulta2='SELECT CLIENTES.Nombre,CLIENTES.Paterno,CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                        ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                        SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                        LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                        count(DETALLES_PAGOS.NumPago) as NumPago, 
                        12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                        from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                        where CLIENTES.IdCliente=VENTAS.IdCliente 
                        and MANZANAS.IdManzana=LOTES.IdManzana 
                        and   VENTAS.ClaveLote=LOTES.ClaveLote 
                        and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                        and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
            $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
            $fila2=mysqli_fetch_array($resultado2); 
            $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
            $adeudo= number_format($fila2['adeudo'], 2, '.', '');
            $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
            $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
            
            echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                    Precio:  '.$fila['Precio'].'
                    Area:  '.$fila['Area'].'
                    Estado:  '.$fila['Estado'].'';
                if ($fila['Estado']=="Disponible") 
                {
                    
                }
                else if ($fila['Estado']=="Vendido") 
                {
                    echo '
                    Nombre:  '.$nc.'
                    Pago Inicial: '.$fila2['PagoInicial'].'
                    Mensualidad:  '.$mensualidad.' 
                    Abono: '.$ABONADO.'
                    Adeudo: '.$adeudo.'
                    Numero de pagos:  '.$fila2['NumPago'].'
                    Pagos Restantes:  '.$fila2['pagosRes'].'';
                }

                 echo '" >  ';
                if ($fila['Estado']=="Disponible")
                {
                   echo  ' <button onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:22px"> LOTE 14  </button>';  
                }
                else
                {
                echo '<button  onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 22px; border: 0px;" > LOTE 14 </button> ';
                }         
            echo '  </div>';   
        ?>          

        </div>
            <div id="M05">
                <div >
                    <span onmouseover="showdiv5(event);" onmousemove="showdiv5(event);" onmouseout="javascript:document.getElementById('flotante5').style.display='none';"> <center> Manzana 05</center>
                    </span> 
                </div>
                
            <?php  
                include('php/conexion.php');
                $consulta='SELECT  distinct  Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M05" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante5" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                    while ( $fila=mysqli_fetch_array($resultado)) 
                    {
                        echo'<tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                    }         
                    echo'</table>
                    </div>'
            ?>   
            <?php
                include('php/conexion.php');
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L01"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                    }
                    echo '  </div>';
               
                
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L02"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L03"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                    }
                    echo '  </div>';

                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L04"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L05"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L06"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 6 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L07"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 7 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7 </button> ';
                    }
                    echo '  </div>';
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L08"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 8 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L09"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M05L10"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 10 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                    }
                    echo '  </div>';
               
                
           ?>

         </div>
         <div id="M06">
            <div >
               <span onmouseover="showdiv6(event);" onmousemove="showdiv6(event);" onmouseout="javascript:document.getElementById('flotante6').style.display='none';"> <center> Manzana 06</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT  distinct  Nombre,Paterno,Materno,
                             l.ClaveLote as Lote
                          FROM CLIENTES c 
                          INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                          INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                          INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                          WHERE m.IdManzana = "M06" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante6" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                     echo'  <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                    echo'</table>
                    </div>'
            ?>    
             <?php
                include('php/conexion.php');
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L01"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                    }
                    echo '  </div>';
               
                
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L02"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L03"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                    }
                    echo '  </div>';

                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L04"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L05"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L06"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 6 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L07"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 7 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7 </button> ';
                    }
                    echo '  </div>';
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L08"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 8 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L09"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M06L10"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 10 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                    }
                    echo '  </div>';
           ?>          
        </div>
          
        <div id="M07">
            <div >
                <span onmouseover="showdiv7(event);" onmousemove="showdiv7(event);" onmouseout="javascript:document.getElementById('flotante7').style.display='none';"> <center> Manzana 07</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M07" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante7" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                echo'   </table>
                    </div>'
            ?>    
             <?php
                include('php/conexion.php');
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L01"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                    }
                    echo '  </div>';
               
                
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L02"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L03"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                    }
                    echo '  </div>';

                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L04"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L05"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L06"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 6 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L07"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 7 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7 </button> ';
                    }
                    echo '  </div>';
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L08"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 8 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L09"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M07L10"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 10 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                    }
                    echo '  </div>';
               
                
           ?>

        </div>
        <div id="M08">
            <div >
               <span onmouseover="showdiv8(event);" onmousemove="showdiv8(event);" onmouseout="javascript:document.getElementById('flotante8').style.display='none';"> <center> Manzana 08</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M08" ORDER BY l.ClaveLote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante8" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                    echo'</table>
                    </div>'
            ?>     
             <?php
                include('php/conexion.php');
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L01"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                    }
                    echo '  </div>';
               
                
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L02"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L03"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                    }
                    echo '  </div>';

                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L04"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L05"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L06"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 6 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L07"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 7 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7 </button> ';
                    }
                    echo '  </div>';
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L08"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 8 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L09"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M08L10"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 10 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                    }
                    echo '  </div>';
           ?>
        </div>
          
        <div id="M09">
            <div >
               <span onmouseover="showdiv9(event);" onmousemove="showdiv9(event);" onmouseout="javascript:document.getElementById('flotante9').style.display='none';"> <center> Manzana 09</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M09" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante9" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                echo'   </table>
                    </div>'
            ?>   
            <?php
                include('php/conexion.php');
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L01"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                    }
                    echo '  </div>';
               
                
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L02"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L03"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                    }
                    echo '  </div>';

                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L04"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L05"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L06"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 6 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L07"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 7 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7 </button> ';
                    }
                    echo '  </div>';
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L08"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 8 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L09"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M09L10"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 10 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                    }
                    echo '  </div>';
               
                
           ?>

        </div>
        <div id="M10">
            <div >
                <span onmouseover="showdiv10(event);" onmousemove="showdiv10(event);" onmouseout="javascript:document.getElementById('flotante10').style.display='none';"> <center> Manzana 10</center></span> 
            </div>
            <?php  
                include('php/conexion.php');
                $consulta='SELECT    Nombre,Paterno,Materno,
                            l.ClaveLote as Lote
                            FROM CLIENTES c 
                            INNER JOIN VENTAS v ON c.IdCliente = v.IdCliente 
                            INNER JOIN LOTES l ON v.ClaveLote = l.Clavelote 
                            INNER JOIN MANZANAS m ON l.IdManzana = m.IdManzana 
                            WHERE m.IdManzana = "M10" ORDER BY l.Clavelote';

                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                echo'<div id="flotante10" >
                        <table border="1px" >
                            <tr>
                                <td>Nombre Completo</td>
                                <td>Lote</td>
                            </tr>';
                while ( $fila=mysqli_fetch_array($resultado)) 
                {
                    echo'   <tr>
                                <td>'.$fila['Nombre'].' '.$fila['Paterno'].' '.$fila['Materno'].'</td>
                                <td>'.$fila['Lote'].'</td>
                            </tr>';
                }         
                echo'   </table>
                    </div>'
            ?>
             <?php
                include('php/conexion.php');
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L01"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 1 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 1 </button> ';
                    }
                    echo '  </div>';
               
                
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L02"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 2 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 2 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L03"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 3 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 3 </button> ';
                    }
                    echo '  </div>';

                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L04"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 4 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 4 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L05"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 5 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 5 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L06"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 6 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 6 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L07"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 7 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 7 </button> ';
                    }
                    echo '  </div>';
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L08"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 8 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 8 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L09"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 9 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 9 </button> ';
                    }
                    echo '  </div>';
               
                $consulta='SELECT ClaveLote,Precio,Area,Estado  FROM LOTES   WHERE ClaveLote="M10L10"';
                $resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
                $fila=mysqli_fetch_array($resultado);
                $consulta2='SELECT  CLIENTES.Nombre,CLIENTES.Paterno,
                            CLIENTES.Materno,LOTES.Estado,VENTAS.PagoInicial,
                            ((LOTES.PRECIO)- VENTAS.PagoInicial)/12 as mensualidad,
                            SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial AS ABONADO,
                            LOTES.Precio -( SUM(DETALLES_PAGOS.ABONO)+ VENTAS.PagoInicial) AS adeudo,
                            count(DETALLES_PAGOS.NumPago) as NumPago, 
                            12-(COUNT(DETALLES_PAGOS.ABONO)) AS pagosRes
                            from LOTES,CLIENTES,VENTAS,DETALLES_PAGOS,MANZANAS
                            where CLIENTES.IdCliente=VENTAS.IdCliente 
                            and MANZANAS.IdManzana=LOTES.IdManzana 
                            and   VENTAS.ClaveLote=LOTES.ClaveLote 
                            and  DETALLES_PAGOS.IdVentas=VENTAS.IdVentas 
                            and LOTES.ClaveLote="'.$fila['ClaveLote'].'"';
                $resultado2=mysqli_query($conexion,$consulta2) or die(mysqli_error());
                $fila2=mysqli_fetch_array($resultado2); 
                $mensualidad= number_format($fila2['mensualidad'], 2, '.', '');
                $adeudo= number_format($fila2['adeudo'], 2, '.', '');
                $ABONADO= number_format($fila2['ABONADO'], 2, '.', '');
                $nc=$fila2['Nombre'].' '.$fila2['Paterno'].' '.$fila2['Materno'];  
                
                echo'<div  id="'.$fila['ClaveLote'].'"   title=" INFORMACIÓN DEL LOTE
                        Precio:  '.$fila['Precio'].'
                        Area:  '.$fila['Area'].'
                        Estado:  '.$fila['Estado'].'';
                    if ($fila['Estado']=="Disponible") 
                    {
                    
                    }
                    else if ($fila['Estado']=="Vendido") 
                    {
                        echo '
                        Nombre:  '.$nc.'
                        Pago Inicial: '.$fila2['PagoInicial'].'
                        Mensualidad:  '.$mensualidad.' 
                        Abono: '.$ABONADO.'
                        Adeudo: '.$adeudo.'
                        Numero de pagos:  '.$fila2['NumPago'].'
                        Pagos Restantes:  '.$fila2['pagosRes'].'';
                    }
                    echo '" >  ';
                    if ($fila['Estado']=="Disponible")
                    {
                        echo  ' <button  onclick=mandarVenta("'.$fila['ClaveLote'].'") style="width:73px; height:30px"> LOTE 10 </button>';
                    }
                    else
                    {
                        echo '<button   onclick=mandarPago("'.$fila['ClaveLote'].'") style="background:#DF0101; width: 73px; height: 30px; border: 0px;" > LOTE 10 </button> ';
                    }
                    echo '  </div>';
               
                
           ?>
 
        </div>
        <div id="DC" style="float:left">
            <div id="dc1"></div><div id="dct"><p align=" center"> Lotes Disponibles</p></div>
             <div id="dc2"></div><div id="dct"><p align=" center"> Lotes Vendidos</p></div>
        </div>
        <div style="float:left">
            <br>
            <div>Abel Flores Dircio&nbsp&nbsp&nbsp Crisanto Santos Garcia &nbsp&nbsp&nbsp Sergio Antonio Barrios Garcia</div>
        </div>
        </div>
        <footer>
            <div class="separador"></div>
        </footer>
    </div>
</body>
</html>

<script type="text/javascript">
    function  mandarVenta(pos)
    {
        document.getElementById("principal").style.display="none"
        document.getElementById("forVentas").style.display="block"
        var xmlHttp=new XMLHttpRequest();    
        xmlHttp.onreadystatechange=function()
        {
            if (xmlHttp.readyState==4 && xmlHttp.status==200) 
            {
                document.getElementById("forVentas").innerHTML=xmlHttp.responseText;
            }
        }
        xmlHttp.open("GET","paginas/FVentas.php"+"?pos="+pos,true);
        xmlHttp.send(); 
    }

    function  mandarPago(pos)
    {
        document.getElementById("principal").style.display="none"
        document.getElementById("forPagos").style.display="block" 
        var xmlHttp=new XMLHttpRequest();
        xmlHttp.onreadystatechange=function()
        {
            if (xmlHttp.readyState==4 && xmlHttp.status==200) 
            {
                document.getElementById("forPagos").innerHTML=xmlHttp.responseText;
            }
        }
        xmlHttp.open("GET","paginas/FDetallesVentas.php"+"?pos="+pos,true);
        xmlHttp.send(); 
    }

    function respuestaPago(pos)
    {
        var xmlHttp=new XMLHttpRequest();
        xmlHttp.onreadystatechange=function()
        {
            if (xmlHttp.readyState==4 && xmlHttp.status==200) 
            {
                document.getElementById("pago").innerHTML=xmlHttp.responseText;
            }
        }
        xmlHttp.open("GET","php/consultaPago.php"+"?pos="+pos,true);
        xmlHttp.send();
    }
   
    function respuestaAbono(pos)
    {
        var xmlHttp=new XMLHttpRequest();
        xmlHttp.onreadystatechange=function()
        {
            if (xmlHttp.readyState==4 && xmlHttp.status==200) 
            {
                document.getElementById("abono").innerHTML=xmlHttp.responseText;
            }
        }
        xmlHttp.open("GET","php/consultaAbono.php"+"?pos="+pos,true);
        xmlHttp.send();
    }
</script>
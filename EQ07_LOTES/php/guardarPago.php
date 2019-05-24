<?php
	require_once("conexion.php");
    $insertar="INSERT INTO DETALLES_PAGOS VALUES(".$_POST['NumPago'].",
    			'".$_POST['Abono']."',
    			'".$_POST['Fecha']."',
    			".$_POST['IdVentas'].")";

    mysqli_query($conexion,$insertar) or die(mysqli_error($conexion));
    print "<script>alert(\"Pago Exitoso\");window.location='../index.php';</script>";	
?>
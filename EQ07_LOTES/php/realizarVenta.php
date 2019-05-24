<?php
	require_once("conexion.php");
	$insertar=" INSERT INTO VENTAS(Fecha,PagoInicial,ClaveLote,IdCliente) VALUES('".$_POST['Fecha']."',
				".$_POST['PagoInicial'].",
				'".$_POST['ClaveLote']."',
				".$_POST['IdCliente'].")";

    mysqli_query($conexion,$insertar) or die(mysqli_error($conexion));
    $update=" UPDATE LOTES,VENTAS SET Estado = 'Vendido',Color='#DF0101' 
    		  WHERE LOTES.ClaveLote=VENTAS.ClaveLote";
    mysqli_query($conexion,$update) or die(mysqli_error($conexion));
    print "<script>alert(\"Registro Exitoso\");window.location='../index.php';</script>";	
?>
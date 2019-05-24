<?php
 	include('../php/conexion.php');
 		
 	$consulta=" UPDATE CLIENTES SET Nombre='".$_POST['nombre']."',
 				Paterno='".$_POST['paterno']."',
 				Materno='".$_POST['materno']."',
 				Ciudad='".$_POST['ciudad']."',
 				Colonia='".$_POST['colonia']."',
 				Calle='".$_POST['calle']."',
 				Numero='".$_POST['numero']."',
 				TelCasa='".$_POST['telcasa']."',
 				TelCel='".$_POST['celular']."',
 				FechaNacimiento='".$_POST['fnacimiento']."' 
 				WHERE IdCliente =".$_POST['id']." "; 
 				
	$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());
	header("Location:../phpC/IClientes.php");
?>
<?php

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', 'chrys', 'BDA2018_EQ07_LOTES');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

		//escaping, additionally removing everything that could be (html/javascript-) code
	$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$paterno=mysqli_real_escape_string($con,(strip_tags($_POST["paterno"],ENT_QUOTES)));
	$materno=mysqli_real_escape_string($con,(strip_tags($_POST["materno"],ENT_QUOTES)));
	$ciudad=mysqli_real_escape_string($con,(strip_tags($_POST["ciudad"],ENT_QUOTES)));
	$colonia=mysqli_real_escape_string($con,(strip_tags($_POST["colonia"],ENT_QUOTES)));
	$calle=mysqli_real_escape_string($con,(strip_tags($_POST["calle"],ENT_QUOTES)));
	$numero=mysqli_real_escape_string($con,(strip_tags($_POST["numero"],ENT_QUOTES)));
	$telcasa=mysqli_real_escape_string($con,(strip_tags($_POST["telcasa"],ENT_QUOTES)));
	$celular=mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));
	$fnacimiento=mysqli_real_escape_string($con,(strip_tags($_POST["fnacimiento"],ENT_QUOTES)));

	$sql="INSERT INTO CLIENTES (IdCliente,Nombre, Paterno, Materno, Ciudad, Colonia, Calle, Numero, TelCasa,TelCel, FechaNacimiento) VALUES (null,'".$nombre."', '".$paterno."', '".$materno."', '".$ciudad."', '".$colonia."', '".$calle."','".$numero."','".$telcasa."', '".$celular."','".$fnacimiento."')";
	$query_update = mysqli_query($con,$sql);
	if ($query_update)
	{
		$messages[] = "Los datos han sido guardados satisfactoriamente.";
	} 
	else
	{
		$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
	}
	if (isset($errors))
	{	
?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			<?php
				foreach ($errors as $error) 
				{
					echo $error;
				}
			?>
		</div>
<?php
	}
	if (isset($messages))
	{
?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Bien hecho!</strong>
			<?php
				foreach ($messages as $message) 
				{
					echo $message;
				}
			?>
		</div>
<?php
	}
?>	
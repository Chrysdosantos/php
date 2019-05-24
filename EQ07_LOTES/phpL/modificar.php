<?php

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', 'chrys', 'BDA2018_EQ07_LOTES');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	if(empty($_POST['codigo'])){
			$errors[] = "Clave vacío";
		} else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['moneda'])){
			$errors[] = "Area vacío";
		} else if (empty($_POST['capital'])){
			$errors[] = "Precio vacío";
		} else if (empty($_POST['continente'])){
			$errors[] = "IdManzana vacío";
		}   else if (
			!empty($_POST['codigo']) && 
			!empty($_POST['nombre']) &&
			!empty($_POST['moneda']) &&
			!empty($_POST['capital']) &&
			!empty($_POST['continente'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$moneda=mysqli_real_escape_string($con,(strip_tags($_POST["moneda"],ENT_QUOTES)));
		$capital=mysqli_real_escape_string($con,(strip_tags($_POST["capital"],ENT_QUOTES)));
		$continente=mysqli_real_escape_string($con,(strip_tags($_POST["continente"],ENT_QUOTES)));
		
		$sql='UPDATE LOTES SET NombreLote="'.$nombre.'",Area="'.$moneda. '", Precio="'.$capital.'", IdManzana="'.$continente.'"	WHERE ClaveLote="'.$codigo.' "';
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>	
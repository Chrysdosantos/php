<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>3 - Parcial - ING - TI</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<?php

	//Incluimos la BD.
	require('conexion.php');

	//Definimos las variables.
	$matriculaConst = '';
	$matriculaVar = '';
	$modalidad = '';
	$nombre = '';
	$paterno = '';
	$materno = '';
	$fechaNac = '';
	$estadoCivil = '';
	$curp = '';
	$claveCarrera = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$matriculaConst = $_POST['tfMatriculaConst'];
		$matriculaVar = $_POST['tfMatriculaVar'];
		$modalidad = $_POST['tfModalidad'];
		$nombre = $_POST['tfNombre'];
		$paterno = $_POST['tfPaterno'];
		$materno = $_POST['tfMaterno'];
		$fechaNac = $_POST['tfFechaNac'];
		$estadoCivil = $_POST['tfEstadoCivil'];
		$curp = $_POST['tfCurp'];
		$claveCarrera = $_POST['tfClaveCarrera'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO alumnos VALUES ('$matriculaConst','$matriculaVar','$modalidad','$nombre','$paterno','$materno','$fechaNac','$estadoCivil','$curp','$claveCarrera')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$matriculaVar = '';
		$modalidad = '';
		$nombre = '';
		$paterno = '';
		$materno = '';
		$fechaNac = '';
		$estadoCivil = '';
		$curp = '';
		$claveCarrera = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$matriculaConst = $_POST['tfMatriculaConst'];
		$matriculaVar = $_POST['tfMatriculaVar'];
		$modalidad = $_POST['tfModalidad'];
		$nombre = $_POST['tfNombre'];
		$paterno = $_POST['tfPaterno'];
		$materno = $_POST['tfMaterno'];
		$fechaNac = $_POST['tfFechaNac'];
		$estadoCivil = $_POST['tfEstadoCivil'];
		$curp = $_POST['tfCurp'];
		$claveCarrera = $_POST['tfClaveCarrera'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE alumnos SET MatriculaConst = '$matriculaConst',MatriculaVar = '$matriculaVar',Modalidad = '$modalidad',Nombre = '$nombre',Paterno = '$paterno',Materno = '$materno',FechaNac = '$fechaNac',EstadoCivil = '$estadoCivil',Curp = '$curp',ClaveCarrera = '$claveCarrera' WHERE MatriculaVar = '$matriculaVar'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$matriculaVar = '';
		$modalidad = '';
		$nombre = '';
		$paterno = '';
		$materno = '';
		$fechaNac = '';
		$estadoCivil = '';
		$curp = '';
		$claveCarrera = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$matriculaVar = $_POST['btnEditar'];

		$consult = "SELECT * FROM alumnos WHERE MatriculaVar = '$matriculaVar'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$matriculaConst = $fila['MatriculaConst'];
		$modalidad = $fila['Modalidad'];
		$nombre = $fila['Nombre'];
		$paterno = $fila['Paterno'];
		$materno = $fila['Materno'];
		$fechaNac = $fila['FechaNac'];
		$estadoCivil = $fila['EstadoCivil'];
		$curp = $fila['Curp'];
		$claveCarrera = $fila['ClaveCarrera'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$matriculaVar = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM alumnos WHERE MatriculaVar = '$matriculaVar'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$matriculaVar = '';
		$modalidad = '';
		$nombre = '';
		$paterno = '';
		$materno = '';
		$fechaNac = '';
		$estadoCivil = '';
		$curp = '';
		$claveCarrera = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($matriculaConst,$matriculaVar,$modalidad,$nombre,$paterno,$materno,$fechaNac,$estadoCivil,$curp,$claveCarrera,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($matriculaConst,$matriculaVar,$modalidad,$nombre,$paterno,$materno,$fechaNac,$estadoCivil,$curp,$claveCarrera,$opcion)
	{
		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='alumnos.php' method='post' class='wrap'>
			Matricula Constante:<input type='text' name='tfMatriculaConst' value='$matriculaConst' placeholder='571619' autofocus>
			Matricula Variable:<input type='text' name='tfMatriculaVar' value='$matriculaVar' placeholder='00120'>
			Modalidad:<input type='text' name='tfModalidad' value='$modalidad' placeholder='Escolarizado'><br>
			Nombre:<input type='text' name='tfNombre' value='$nombre' placeholder='Elizabeth'>
			Paterno:<input type='text' name='tfPaterno' value='$paterno' placeholder='Mendoza'>
			Materno:<input type='text' name='tfMaterno' value='$materno' placeholder='Sanchez'><br>
			Fecha Nacimiento:<input type='text' name='tfFechaNac' value='$fechaNac' placeholder='1994-08-23'>
			Estado Civil:<input type='text' name='tfEstadoCivil' value='$estadoCivil' placeholder='Soltero@'>
			Curp:<input type='text' name='tfCurp' value='$curp' placeholder='SAEZ230894HGRMNJ02'>
			Clave Carrera:<input type='text' name='tfClaveCarrera' value='$claveCarrera' placeholder='TSU-TIC'><br>";

			if($opcion == "edit")
				echo "<input type='submit' name='btnModificar' value='Modificar'/>";
			elseif($opcion == "reg")
				echo "<input type='submit' name='btnRegistrar' value='Registrar'/>";
			elseif($opcion == "bus")
				echo "<input type='submit' name='btnBuscar' value='Buscar'/>";


		echo "<input type='reset' name='btnCancelar' value='Cancelar'/>
		</form>
		</center>";
	}

	//Función Para Mostrar los Datos.
	function mostrarResultados()
	{
		//Incluimos la Conexión.
		require('conexion.php');

		//Realizamos la Consulta de los Datos.
		$consulta = 'SELECT * FROM alumnos';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='alumnos.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Alumnos</h2>
			<tr>
				<th>Matricula Constante</th>
				<th>Matricula Variable</th>
				<th>Modalidad</th>
				<th>Nombre</th>
				<th>Paterno</th>
				<th>Materno</th>
				<th>Fecha Nacimiento</th>
				<th>Estado Civil</th>
				<th>Curp</th>
				<th>Clave Carrera</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$matriculaConst = $fila['MatriculaConst'];
			$matriculaVar = $fila['MatriculaVar'];
			$modalidad = $fila['Modalidad'];
			$nombre = $fila['Nombre'];
			$paterno = $fila['Paterno'];
			$materno = $fila['Materno'];
			$fechaNac = $fila['FechaNac'];
			$estadoCivil = $fila['EstadoCivil'];
			$curp = $fila['Curp'];
			$claveCarrera = $fila['ClaveCarrera'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$matriculaConst</td>
				<td>$matriculaVar</td>
				<td>$modalidad</td>
				<td>$nombre</td>
				<td>$paterno</td>
				<td>$materno</td>
				<td>$fechaNac</td>
				<td>$estadoCivil</td>
				<td>$curp</td>
				<td>$claveCarrera</td>
				<td>
				  <button name='btnEditar' value='$matriculaVar'>Editar</button>
				  <button name='btnEliminar' value='$matriculaVar'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>
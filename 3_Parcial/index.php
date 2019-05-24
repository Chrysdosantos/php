<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UT</title>
	<link rel="stylesheet" href="estilos_principal.css">
	<link rel="stylesheet" href="estilo.css">
	<script type="text/javascript" src="alumnos.js"></script>
</head>
<body>
	<div id="contenedor">
    <div id="encabezado">
	<header>
		<h1>Control de Alumnos UT</h1>
	</header>
	<nav>
		<ul class="nav"> 
			<li><a href="generaciones.php">Generaciones</a></li>
			<li><a href="periodos.php">Periodos</a></li>
			<li><a href="carreras.php">Carreras</a></li>
			<li><a href="grupos.php">Grupos</a></li>
			<li><a href="inscripciones.php">Inscripciones</a></li>
			<li><a href="materias.php">Materias</a></li>
			<li><a href="profesores.php">Profesores</a></li>
			<li><a href="imparte.php">Imparte</a></li>
			<li><a href="#">Calificaciones</a></li>
            <li><a href="index.php">Inicio</a></li>
		</ul>
	</nav>
	</div>

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

	if(isset($_POST['btnBuscar'])) 
	{
		$matriculaConst = $_POST['tfMatriculaConst'];
		$modalidad = $_POST['tfModalidad'];
		$claveCarrera = $_POST['tfClaveCarrera'];

		$consult = "SELECT * FROM alumnos where ClaveCarrera = '$claveCarrera' 
		AND MatriculaConst ='$matriculaConst' AND Modalidad ='$modalidad'";
		$res = mysqli_query($conexion,$consult);
		//Aqui Creamos el Formulario.
		echo "
		<form action='index.php' method='post' id='frmBuscar'>
		<center><br>
		<table border='3' cellpadding='10'>
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
		while ($fila = mysqli_fetch_array($res))
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

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>

</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($matriculaConst,$matriculaVar,$modalidad,$nombre,$paterno,$materno,$fechaNac,$estadoCivil,$curp,$claveCarrera,$opcion)
	{

		require('conexion.php');

		$sql="SELECT * FROM generaciones";
    	$result = mysqli_query($conexion,$sql);

    	$combo='';
    	$combo2='';
   		while($row = $result->fetch_array()) 
   		{
    	 $combo .= "<option value='".$row["MatriculaConst"]."'>".$row["MatriculaConst"]."</option>";
    	 $combo2 .= "<option value='".$row["Modalidad"]."'>".$row["Modalidad"]."</option>";
   		}

   		$sq="SELECT * FROM carreras";
    	$res = mysqli_query($conexion,$sq);

    	$combo3='';
   		while($fila = $res->fetch_array()) 
   		{
    	 $combo3 .= "<option value='".$fila["ClaveCarrera"]."'>".$fila["ClaveCarrera"]."</option>";
   		}

		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='index.php' method='post' class='wrap'>
			<label>Clave Carrera:</label><select name='tfClaveCarrera'><option>Seleccione Una Carrera</option>$combo3</select>
			<label>Matricula Constante:</label><select name='tfMatriculaConst'><option>Seleccione Una Matricula</option>$combo</select>
			<label>Modalidad:</label><select name='tfModalidad'><option>Seleccione Una Modalidad</option>$combo2</select><input type='submit' name='btnBuscar' id='btnBuscar' value='Buscar'/><br>
			<label>Matricula Variable:</label><input type='text' name='tfMatriculaVar' value='$matriculaVar' placeholder='00120'>
			<label>Nombre:</label><input type='text' name='tfNombre' value='$nombre' placeholder='Elizabeth'>
			<label>Paterno:</label><input type='text' name='tfPaterno' value='$paterno' placeholder='Mendoza'>
			<label>Materno:</label><input type='text' name='tfMaterno' value='$materno' placeholder='Sanchez'>
			<label>Fecha Nacimiento:</label><input type='text' name='tfFechaNac' value='$fechaNac' placeholder='1994-08-23'>
			<label>Estado Civil:</label><input type='text' name='tfEstadoCivil' value='$estadoCivil' placeholder='Soltero@'>
			<label>Curp:</label><input type='text' name='tfCurp' value='$curp' placeholder='SAEZ230894HGRMNJ02'><br><br>";

			if($opcion == "edit")
				echo "<input type='submit' name='btnModificar' value='Modificar'/>";
			elseif($opcion == "reg")
				echo "<input type='submit' name='btnRegistrar' value='Registrar'/>";

		echo "<label></label><input type='reset' name='btnCancelar' value='Cancelar'/>
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
		<form action='index.php' method='post' id='frmMostrar'>
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
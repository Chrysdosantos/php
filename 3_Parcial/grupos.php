<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>3 - Parcial - ING - TI</title>
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="estilos_principal.css">
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
	$claveGrupo = '';
	$cuatrimestre = '';
	$letra = '';
	$turno = '';
	$claveCarrera = '';
	$clavePeriodo = '';
	$opcion = 'reg';

	//Variables Para Los Filtros.
	$claveC = '';
	$claveP = '';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$claveGrupo = $_POST['tfClaveGrupo'];
		$cuatrimestre = $_POST['tfCuatrimestre'];
		$letra = $_POST['tfLetra'];
		$turno = $_POST['tfTurno'];
		$claveCarrera = $_POST['tfClaveCarrera'];
		$clavePeriodo = $_POST['tfClavePeriodo'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO grupos VALUES ('$claveGrupo','$cuatrimestre','$letra','$turno','$claveCarrera','$clavePeriodo')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$claveGrupo = '';
		$cuatrimestre = '';
		$letra = '';
		$turno = '';
		$claveCarrera = '';
		$clavePeriodo = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$claveGrupo = $_POST['tfClaveGrupo'];
		$cuatrimestre = $_POST['tfCuatrimestre'];
		$letra = $_POST['tfLetra'];
		$turno = $_POST['tfTurno'];
		$claveCarrera = $_POST['tfClaveCarrera'];
		$clavePeriodo = $_POST['tfClavePeriodo'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE grupos SET ClaveGrupo = '$claveGrupo',Cuatrimestre = '$cuatrimestre',Letra = '$letra',Turno = '$turno',ClaveCarrera = '$claveCarrera',ClavePeriodo = '$clavePeriodo' WHERE ClaveGrupo = '$claveGrupo'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$claveGrupo = '';
		$cuatrimestre = '';
		$letra = '';
		$turno = '';
		$claveCarrera = '';
		$clavePeriodo = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$claveGrupo = $_POST['btnEditar'];

		$consult = "SELECT * FROM grupos WHERE ClaveGrupo = '$claveGrupo'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$cuatrimestre = $fila['Cuatrimestre'];
		$letra = $fila['Letra'];
		$turno = $fila['Turno'];
		$claveCarrera = $fila['ClaveCarrera'];
		$clavePeriodo = $fila['ClavePeriodo'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$claveGrupo = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM grupos WHERE ClaveGrupo = '$claveGrupo'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$claveGrupo = '';
		$cuatrimestre = '';
		$letra = '';
		$turno = '';
		$claveCarrera = '';
		$clavePeriodo = '';
	}

	elseif (isset($_POST['btnBuscar']))
	{
		$claveC = $_POST['tfClaveCarrera'];
		$claveP = $_POST['tfClavePeriodo'];
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($claveGrupo,$cuatrimestre,$letra,$turno,$claveCarrera,$clavePeriodo,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados($claveC,$claveP);

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($claveGrupo,$cuatrimestre,$letra,$turno,$claveCarrera,$clavePeriodo,$opcion)
	{

		require('conexion.php');

		$sql="SELECT * FROM carreras";
    	$result = mysqli_query($conexion,$sql);

    	$combo='';
   		while($row = $result->fetch_array()) 
   		{
    	 $combo .= "<option value='".$row["ClaveCarrera"]."'>".$row["ClaveCarrera"]."</option>";
   		}

   		$sq="SELECT * FROM periodos";
    	$res = mysqli_query($conexion,$sq);

    	$combo2='';
   		while($fila = $res->fetch_array()) 
   		{
    	 $combo2 .= "<option value='".$fila["ClavePeriodo"]."'>".$fila["ClavePeriodo"]."</option>";
   		}

		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='grupos.php' method='post' class='wrap'>
			<label>Clave Carrera:</label><select name='tfClaveCarrera'><option>Seleccione Una Clave</option>$combo</select>
			<label>Clave Periodo:</label><select name='tfClavePeriodo'><option>Seleccione Una Clave</option>$combo2</select>
			<label>Clave Grupo:</label><input type='text' name='tfClaveGrupo' value='$claveGrupo' placeholder='1AM-TIC-SD16' autofocus><br>
			<label>Cuatrimestre:</label><input type='text' name='tfCuatrimestre' value='$cuatrimestre' placeholder='1'>
			<label>Letra:</label><input type='text' name='tfLetra' value='$letra' placeholder='A'>
			<label>Turno:</label><input type='text' name='tfTurno' value='$turno' placeholder='Matutino'><br>";

			if($opcion == "edit")
				echo "<input type='submit' name='btnModificar' value='Modificar'/>";
			elseif($opcion == "reg")
				echo "<input type='submit' name='btnRegistrar' value='Registrar'/>";


		echo "<label></label><input type='reset' name='btnCancelar' value='Cancelar'/>
		</form>
		</center>";
	}

	//Función Para Mostrar los Datos.
	function mostrarResultados($claveC,$claveP)
	{
		//Incluimos la Conexión.
		require('conexion.php');

		//Realizamos la Consulta de los Datos.
		$consulta = "SELECT * FROM grupos WHERE ClaveCarrera = '$claveC' AND ClavePeriodo = '$claveP'";
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='grupos.php' method='post'>
		<center><br>
		<input type='submit' name='btnBuscar' value='Buscar'/>
		<table border='3' cellpadding='10'><h2>Grupos</h2>
			<tr>
				<th>Clave Grupo</th>
				<th>Cuatrimestre</th>
				<th>Letra</th>
				<th>Turno</th>
				<th>Clave Carrera</th>
				<th>Clave Periodo</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$claveGrupo = $fila['ClaveGrupo'];
			$cuatrimestre = $fila['Cuatrimestre'];
			$letra = $fila['Letra'];
			$turno = $fila['Turno'];
			$claveCarrera = $fila['ClaveCarrera'];
			$clavePeriodo = $fila['ClavePeriodo'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$claveGrupo</td>
				<td>$cuatrimestre</td>
				<td>$letra</td>
				<td>$turno</td>
				<td>$claveCarrera</td>
				<td>$clavePeriodo</td>
				<td>
				  <button name='btnEditar' value='$claveGrupo'>Editar</button>
				  <button name='btnEliminar' value='$claveGrupo'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>
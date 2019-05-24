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
	$claveMat = '';
	$nombre = '';
	$cuatrimestre = '';
	$plan = '';
	$modalidad = '';
	$claveCarrera = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$claveMat = $_POST['tfClaveMat'];
		$nombre = $_POST['tfNombre'];
		$cuatrimestre = $_POST['tfCuatrimestre'];
		$plan = $_POST['tfPlan'];
		$modalidad = $_POST['tfModalidad'];
		$claveCarrera = $_POST['tfClaveCarrera'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO materias VALUES ('$claveMat','$nombre','$cuatrimestre','$plan','$modalidad','$claveCarrera')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$claveMat = '';
		$nombre = '';
		$cuatrimestre = '';
		$plan = '';
		$modalidad = '';
		$claveCarrera = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$claveMat = $_POST['tfClaveMat'];
		$nombre = $_POST['tfNombre'];
		$cuatrimestre = $_POST['tfCuatrimestre'];
		$plan = $_POST['tfPlan'];
		$modalidad = $_POST['tfModalidad'];
		$claveCarrera = $_POST['tfClaveCarrera'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE materias SET ClaveMat = '$claveMat',Nombre = '$nombre',Cuatrimestre = '$cuatrimestre',Plan = '$plan',Modalidad = '$modalidad',ClaveCarrera = '$claveCarrera' WHERE ClaveMat = '$claveMat'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$claveMat = '';
		$nombre = '';
		$cuatrimestre = '';
		$plan = '';
		$modalidad = '';
		$claveCarrera = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$claveMat = $_POST['btnEditar'];

		$consult = "SELECT * FROM materias WHERE ClaveMat = '$claveMat'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$nombre = $fila['Nombre'];
		$cuatrimestre = $fila['Cuatrimestre'];
		$plan = $fila['Plan'];
		$modalidad = $fila['Modalidad'];
		$claveCarrera = $fila['ClaveCarrera'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$claveMat = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM materias WHERE ClaveMat = '$claveMat'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$claveMat = '';
		$nombre = '';
		$cuatrimestre = '';
		$plan = '';
		$modalidad = '';
		$claveCarrera = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($claveMat,$nombre,$cuatrimestre,$plan,$modalidad,$claveCarrera,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($claveMat,$nombre,$cuatrimestre,$plan,$modalidad,$claveCarrera,$opcion)
	{

		require('conexion.php');

		$sql="SELECT * FROM generaciones";
    	$result = mysqli_query($conexion,$sql);

    	$combo='';
   		while($row = $result->fetch_array()) 
   		{
    	 $combo .= "<option value='".$row["Modalidad"]."'>".$row["Modalidad"]."</option>";
   		}

   		$sq="SELECT * FROM carreras";
    	$res = mysqli_query($conexion,$sq);

    	$combo2='';
   		while($fila = $res->fetch_array()) 
   		{
    	 $combo2 .= "<option value='".$fila["ClaveCarrera"]."'>".$fila["ClaveCarrera"]."</option>";
   		}

		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='materias.php' method='post' class='wrap'>
			<label>Clave Carrera:</label><select name='tfClaveCarrera'><option>Seleccione Una Carrera</option>$combo2</select>
			<label>Modalidad:</label><select name='tfModalidad'><option>Seleccione Una Modalidad</option>$combo</select>
			<label>Clave Materia:</label><input type='text' name='tfClaveMat' value='$claveMat' placeholder='101E-TTIC16' autofocus><br>
			<label>Nombre:</label><input type='text' name='tfNombre' value='$nombre' placeholder='Algebra Lineal'>
			<label>Cuatrimestre:</label><input type='text' name='tfCuatrimestre' value='$cuatrimestre' placeholder='1'>
			<label>Plan:</label><input type='text' name='tfPlan' value='$plan' placeholder='2016'><br>";

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
		$consulta = 'SELECT * FROM materias';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='materias.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Materias</h2>
			<tr>
				<th>Clave Materia</th>
				<th>Nombre</th>
				<th>Cuatrimestre</th>
				<th>Plan</th>
				<th>Modalidad</th>
				<th>Clave Carrera</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$claveMat = $fila['ClaveMat'];
			$nombre = $fila['Nombre'];
			$cuatrimestre = $fila['Cuatrimestre'];
			$plan = $fila['Plan'];
			$modalidad = $fila['Modalidad'];
			$claveCarrera = $fila['ClaveCarrera'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$claveMat</td>
				<td>$nombre</td>
				<td>$cuatrimestre</td>
				<td>$plan</td>
				<td>$modalidad</td>
				<td>$claveCarrera</td>
				<td>
				  <button name='btnEditar' value='$claveMat'>Editar</button>
				  <button name='btnEliminar' value='$claveMat'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>
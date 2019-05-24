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
	$matriculaConst = '';
	$matriculaVar = '';
	$modalidad = '';
	$claveGrupo = '';
	$fecha = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$matriculaConst = $_POST['tfMatriculaConst'];
		$matriculaVar = $_POST['tfMatriculaVar'];
		$modalidad = $_POST['tfModalidad'];
		$claveGrupo = $_POST['tfClaveGrupo'];
		$fecha = $_POST['tfFecha'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO inscripciones VALUES ('$matriculaConst','$matriculaVar','$modalidad','$claveGrupo','$fecha')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$matriculaVar = '';
		$modalidad = '';
		$claveGrupo = '';
		$fecha = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$matriculaConst = $_POST['tfMatriculaConst'];
		$matriculaVar = $_POST['tfMatriculaVar'];
		$modalidad = $_POST['tfModalidad'];
		$claveGrupo = $_POST['tfClaveGrupo'];
		$fecha = $_POST['tfFecha'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE inscripciones SET MatriculaConst = '$matriculaConst',MatriculaVar = '$matriculaVar',Modalidad = '$modalidad',ClaveGrupo = '$claveGrupo',Fecha = '$fecha' WHERE MatriculaVar = '$matriculaVar' AND ClaveGrupo = '$claveGrupo'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$matriculaVar = '';
		$modalidad = '';
		$claveGrupo = '';
		$fecha = '';
	}
	  
	//Editar Datos.     --------Dudas-----------
	elseif (isset($_POST['btnEditar'])) 
	{
		$matriculaVar = $_POST['btnEditar'];

		$consult = "SELECT * FROM inscripciones WHERE MatriculaVar = '$matriculaVar'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$matriculaConst = $fila['MatriculaConst'];
		$modalidad = $fila['Modalidad'];
		$claveGrupo = $fila['ClaveGrupo'];
		$fecha = $fila['Fecha'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.  -------No Funciona--------
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$matriculaVar = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM inscripciones WHERE MatriculaVar AND ClaveGrupo = '$matriculaVar'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$matriculaVar = '';
		$modalidad = '';
		$claveGrupo = '';
		$fecha = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($matriculaConst,$matriculaVar,$modalidad,$claveGrupo,$fecha,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($matriculaConst,$matriculaVar,$modalidad,$claveGrupo,$fecha,$opcion)
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

   		$sq="SELECT * FROM grupos";
    	$res = mysqli_query($conexion,$sq);

    	$combo3='';
   		while($fila = $res->fetch_array()) 
   		{
    	 $combo3 .= "<option value='".$fila["ClaveGrupo"]."'>".$fila["ClaveGrupo"]."</option>";
   		}

   		$s="SELECT * FROM alumnos";
    	$re = mysqli_query($conexion,$s);

    	$combo4='';
   		while($fi = $re->fetch_array()) 
   		{
    	 $combo4 .= "<option value='".$fi["MatriculaVar"]."'>".$fi["MatriculaVar"]."</option>";
   		}

		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='inscripciones.php' method='post' class='wrap'>
			<label>Matricula Constante:</label><select name='tfMatriculaConst'><option>Seleccione Una Matricula</option>$combo</select>
			<label>Matricula Variable:</label><select name='tfMatriculaVar'><option>Seleccione Una Matricula</option>$combo4</select>
			<label>Modalidad:</label><select name='tfModalidad'><option>Seleccione Una Modalidad</option>$combo2</select><br><br>
			<label>Clave Grupo:</label><select name='tfClaveGrupo'><option>Seleccione Un Grupo</option>$combo3</select>
			<label>Fecha:</label><input type='text' name='tfFecha' value='$fecha' placeholder='2016-07-11'><br>";

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
		$consulta = 'SELECT * FROM inscripciones';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='inscripciones.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Inscripciones</h2>
			<tr>
				<th>Matricula Constante</th>
				<th>Matricula Variable</th>
				<th>Modalidad</th>
				<th>Clave Grupo</th>
				<th>Fecha</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$matriculaConst = $fila['MatriculaConst'];
			$matriculaVar = $fila['MatriculaVar'];
			$modalidad = $fila['Modalidad'];
			$claveGrupo = $fila['ClaveGrupo'];
			$fecha = $fila['Fecha'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$matriculaConst</td>
				<td>$matriculaVar</td>
				<td>$modalidad</td>
				<td>$claveGrupo</td>
				<td>$fecha</td>
				<td>
				  <button name='btnEditar' value='$matriculaVar'>Editar</button>
				  <button name='btnEliminar' value='$matriculaVar,$claveGrupo'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>
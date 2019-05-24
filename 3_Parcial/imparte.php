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
	$idProf = '';
	$claveMat = '';
	$claveGrupo = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$idProf = $_POST['tfIdProf'];
		$claveMat = $_POST['tfClaveMat'];
		$claveGrupo = $_POST['tfClaveGrupo'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO imparte VALUES ('$idProf','$claveMat','$claveGrupo')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$idProf = '';
		$claveMat = '';
		$claveGrupo = '';
	}

	//Actualizar Datos.     -------pendiente--------
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$idProf = $_POST['tfIdProf'];
		$claveMat = $_POST['tfClaveMat'];
		$claveGrupo = $_POST['tfClaveGrupo'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE imparte SET IdProf = '$idProf',ClaveMat = '$claveMat',ClaveGrupo = '$claveGrupo' WHERE MatriculaConst = '$matriculaConst'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$idProf = '';
		$claveMat = '';
		$claveGrupo = '';
	}
	  
	//Editar Datos.      --------pediente-------
	elseif (isset($_POST['btnEditar'])) 
	{
		$idProf = $_POST['btnEditar'];

		$consult = "SELECT * FROM imparte WHERE MatriculaConst = '$matriculaConst'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$modalidad = $fila['Modalidad'];
		$generacion = $fila['Generacion'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.     ------pendiente-------
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$matriculaConst = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM generaciones WHERE MatriculaConst = '$matriculaConst'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$idProf = '';
		$claveMat = '';
		$claveGrupo = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($idProf,$claveMat,$claveGrupo,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($idProf,$claveMat,$claveGrupo,$opcion)
	{

		require('conexion.php');

		$sql="SELECT * FROM profesores";
    	$result = mysqli_query($conexion,$sql);

    	$combo='';
   		while($row = $result->fetch_array()) 
   		{
    	 $combo .= "<option value='".$row["IdProf"]."'>".$row["IdProf"]."</option>";
   		}

   		$sqli="SELECT * FROM materias";
    	$resulta = mysqli_query($conexion,$sqli);

    	$combo2='';
   		while($fil = $resulta->fetch_array()) 
   		{
    	 $combo2 .= "<option value='".$fil["ClaveMat"]."'>".$fil["ClaveMat"]."</option>";
   		}

   		$sq="SELECT * FROM grupos";
    	$res = mysqli_query($conexion,$sq);

    	$combo3='';
   		while($fila = $res->fetch_array()) 
   		{
    	 $combo3 .= "<option value='".$fila["ClaveGrupo"]."'>".$fila["ClaveGrupo"]."</option>";
   		}

		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='imparte.php' method='post' class='wrap'>
			<label>Id Profesor:</label><select name='tfIdProf'><option>Seleccione Un ID</option>$combo</select>
			<label>Clave Materia:</label><select name='tfClaveMat'><option>Seleccione Una Clave</option>$combo2</select>
			<label>Clave Grupo:</label><select name='tfClaveGrupo'><option>Seleccione Un Grupo</option>$combo3</select><br><br>";

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
		$consulta = 'SELECT * FROM imparte';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='imparte.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Imparte</h2>
			<tr>
				<th>Id Profesor</th>
				<th>Clave Materia</th>
				<th>Clave Grupo</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$idProf = $fila['IdProf'];
			$claveMat = $fila['ClaveMat'];
			$claveGrupo = $fila['ClaveGrupo'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$idProf</td>
				<td>$claveMat</td>
				<td>$claveGrupo</td>
				<td>
				  <button name='btnEditar' value='$idProf'>Editar</button>
				  <button name='btnEliminar' value='$idProf'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>
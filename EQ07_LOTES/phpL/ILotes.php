<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lotes</title>
    <link rel="stylesheet" type="text/css" href="../Css/Estilos.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<header>
  			<ul class="menu">
      			<li><a href="../index.php">Inicio</a></li>
      			<li><a href="../phpC/IClientes.php">Clientes</a></li>
      			<li><a href="ILotes.php">Lotes</a></li>
    		</ul>
  	</header>
  	<?php include("modal_modificar.php");?>
    <div class="container-fluid">
		<div class='col-xs-6'>	
			<h3> Listado de Lotes</h3>
		</div>
			<div class='col-xs-6'></div>	
			<div class="row">
				<div class="col-xs-12">
					<div id="loader" class="text-center"> <img src="loader.gif"></div>
					<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
					<div class="outer_div"></div><!-- Datos ajax Final -->
				</div>
	  		</div>
		</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>
		Detalle Ventas
	</title>
	<link rel="stylesheet" type="text/css" href="../Css/Estilos2.css">
	<link rel="stylesheet" type="text/css" href="../Css/EstilosFormulario2.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<meta charset="utf-8">
</head>
<body>
   <?php 
      include('../php/conexion.php');
      $consulta="SELECT * FROM LOTES,VENTAS WHERE LOTES.ClaveLote=VENTAS.ClaveLote";
      $resultado=mysqli_query($conexion,$consulta);

      $consulta2='SELECT * FROM VENTAS WHERE ClaveLote="'.$_GET['pos'].'"  ';
      $resultado2=mysqli_query($conexion,$consulta2);
      $fila2=mysqli_fetch_array($resultado2);
   ?>
   
    <?php 
    	$fecha = date('Y-m-j');
   
    	echo '
			<div class="contenedor">
				<header>	
					<ul class="menu">
						<li><a href="index.php">Inicio</a></li>
						<li><a href="phpC/IClientes.php">Clientes</a></li>
						<li><a href="phpL/ILotes.php">Lotes</a></li>
					</ul>
					<br>
					<h1>
			 			Pago de Lotes
					</h1>
				</header>
				<div class="wrap">
					<form method="POST" action="php/guardarPago.php"  >
	     				Id venta:
  		 				<input type="text" readonly  name="IdVentas" id="IdVentas" value="'.$fila2['IdVentas'].'"  onchange="respuesta(); respuesta2(); "  >

      					Clave Lote:
       					<input type="text" readonly  name="ClaveLote" id="ClaveLote" value="'.$fila2['ClaveLote'].'"   >

    					NumPago:  <button  type="button"  onclick=respuestaPago("'.$fila2['ClaveLote'].'") >Calcular</button>
    					<div id="pago">
    						<input type="text" name="NumPago"  required readonly class="form-control" name="IdVentas" placeholder="NumPago" value="">
    					</div>
   						Abono: <button  type="button" onclick=respuestaAbono("'.$fila2['ClaveLote'].'") >Calcular</button>
   						<div id="abono"> 
   							<input type="text" name="Abono" required readonly  class="form-control" name="Fecha" placeholder="Abono" value="">
   						</div>
   						Fecha:
   						<input type="text" required name="Fecha" readonly class="form-control" class="form-control" placeholder="Fecha" name="PInicial" value="'.$fecha.' "> 
   		
  						<input type="submit" value="Guardar">' ; 
  	?>
       					<button id="reset" type="button" onClick="location.href='index.php'">Cancelar</button>
    <?php
     	echo '
					</form>
				</div>
				<footer>
					<div class="separador"></div>
				</footer>
			</div>
			';
	?>
</body>
</html>		



 
<?php


	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', 'chrys', 'BDA2018_EQ07_LOTES');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'pagination.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT COUNT(*) AS numrows FROM LOTES WHERE NOT EXISTS(SELECT * FROM VENTAS WHERE VENTAS.ClaveLote = LOTES.ClaveLote);");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con," SELECT LOTES.ClaveLote AS ClaveLote, LOTES.NombreLote AS NombreLote, LOTES.Area AS Area, LOTES.Precio AS Precio, LOTES.IdManzana AS IdManzana FROM LOTES WHERE NOT EXISTS(SELECT * FROM VENTAS WHERE VENTAS.ClaveLote = LOTES.ClaveLote) ORDER BY LOTES.ClaveLote LIMIT $offset,$per_page");
		
		if ($numrows>0){
			?>
		<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>Clave</th>
				  <th>Nombre</th>
				  <th>Area</th>
				  <th>Precio</th>
				  <th>IdManzana</th>
				  <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $row['ClaveLote'];?></td>
					<td><?php echo $row['NombreLote'];?></td>
					<td><?php echo $row['Area'];?>m<sup>2</sup></td>
					<td><?php echo $row['Precio'];?></td>
					<td><?php echo $row['IdManzana'];?></td>
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-codigo="<?php echo $row['ClaveLote']?>" data-nombre="<?php echo $row['NombreLote']?>" data-moneda="<?php echo $row['Area']?>" data-capital="<?php echo $row['Precio']?>" data-continente="<?php echo $row['IdManzana']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<div class="table-pagination pull-right">
			<?php echo paginate($reload, $page, $total_pages, $adjacents);?>
		</div>
		
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>

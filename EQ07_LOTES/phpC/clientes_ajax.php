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
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM CLIENTES");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT * FROM CLIENTES  order by IdCliente LIMIT $offset,$per_page");
		
		if ($numrows>0){
			?>
		<table class="table table-bordered">
			  <thead>
				<tr>
				  <th>Nombre Completo</th>
				  <th>Ciudad</th>
				  <th>Colonia</th>
				  <th>Calle</th>
				  <th>Numero</th>
				  <th>Telefono</th>
				  <th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo" ".$row['Nombre']." ".$row['Paterno']." ".$row['Materno']." ";?></td>
					<td><?php echo $row['Ciudad'];?></td>
					<td><?php echo $row['Colonia'];?></td>
					<td><?php echo $row['Calle'];?></td>
					<td><?php echo $row['Numero'];?></td>
					<td><?php echo $row['TelCel'];?></td>
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id="<?php echo $row['IdCliente']?>" data-nombre="<?php echo $row['Nombre']?>" data-paterno="<?php echo $row['Paterno']?>" data-materno="<?php echo $row['Materno']?>" data-ciudad="<?php echo $row['Ciudad']?>" data-colonia="<?php echo $row['Colonia']?>"
						data-calle="<?php echo $row['Calle']?>" data-numero="<?php echo $row['Numero']?>" data-telcasa="<?php echo $row['TelCasa']?>" data-celular="<?php echo $row['TelCel']?>" data-fnacimiento="<?php echo $row['FechaNacimiento']?>" ><i class='glyphicon glyphicon-edit'></i> Modificar</button>
						
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['IdCliente']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
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
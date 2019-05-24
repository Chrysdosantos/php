<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php 

	require('conexion.php');
	$sql="SELECT distinct MatriculaConst FROM generaciones";
    $result = mysqli_query($conexion,$sql);

    $combo='';
   while($row = $result->fetch_array()) 
   {
     $combo .= "<option value='".$row["MatriculaConst"]."'>".$row["MatriculaConst"]."</option>";
   }

   $sq="SELECT Generacion FROM generaciones where MatriculaConst = '$combo'";
    $re = mysqli_query($conexion,$sq);

    $combo2='';
   while($fila = $re->fetch_array()) 
   {
     $combo2 .= "<option value='".$fila["Generacion"]."'>".$fila["Generacion"]."</option>";
   }

	?>

	<select >
		<option>hello</option>
		<?php echo "$combo"; ?>
	</select>


	<select >
		<?php echo "$combo2"; ?>
	</select>
	
</body>
</html>
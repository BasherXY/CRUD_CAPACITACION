<html>
<head>
	<title>Agregar</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<?php
	if (isset($_POST['enviar'])) {
		$nombre=$_POST['nombre'];
		$codigo=$_POST['codigo'];

		include("conexion.php");
		$sql="insert into alumnos(nombre, codigo)
		values('".$nombre."','".$codigo."')";

		$resultado=mysqli_query($conexion,$sql);

		if($resultado){
			echo "<script language='JavaScript'>
				alert('Los datos fueron ingresados correctamente en la base de datos');
				location.assign('index.php');
				</script>;
			";
		}else{
			echo "<script language='JavaScript'>
				alert('ERROR: Los datos no fueron ingresasdos correctamente a la base de datos');
				location.assign('index.php');
				</script>";
		}
		mysqli_close($conexion);

	}else{

	?>

	<h1>Agregar Nuevo Alumno</h1>
	<form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
		<label>Nombre:</label>
		<input type="text" name="nombre"><br><br>
		<label>Codigo:</label>
		<input type="text" name="codigo"><br><br>
		<input type="submit" name="enviar" value="AGREGAR">
		<a href="index.php">Regresar</a>
	</form>
	<?php 
	}
	?>
</body>
</html>
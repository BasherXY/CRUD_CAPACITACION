<?php 
	include("conexion.php");
?>
<html>
<head>
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<?php 
		if (isset($_POST['enviar'])) {
			$id=$_POST['dni'];
			$nombre=$_POST['nombre'];
			$codigo=$_POST['codigo'];

			$sql="update alumnos set nombre='".$nombre."', codigo='".$codigo."' where dni='".$id."'";
			$resultado=mysqli_query($conexion,$sql);
		if($resultado){
			echo "<script language='JavaScript'>
				alert('Los datos fueron actualizados correctamente');
				location.assign('index.php');
				</script>;
			";
		}else{
			echo "<script language='JavaScript'>
				alert('Los datos NO fueron actualizados correctamente');
				location.assign('index.php');
				</script>";
		}
			mysqli_close($conexion);

		}else{
			$id=$_GET['id'];
			$sql="select * from alumnos where dni='".$id."'";
			$resultado=mysqli_query($conexion,$sql);

			$fila=mysqli_fetch_assoc($resultado);
			$nombre=$fila["Nombre"];
			$codigo=$fila["Codigo"];

			mysqli_close($conexion);
	?>
	<h1>Editar Alumno</h1>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<label>Nombre:</label>
		<input type="text" name="nombre" value="<?php echo $nombre ?>"><br><br>

		<label>Codigo:</label>
		<input type="text" name="codigo" value="<?php echo $codigo ?>"><br><br>

		<input type="hidden" name="dni" value="<?php echo $id ?>">

		<input type="submit" name="enviar" value="ACTUALIZAR">
		<a href="index.php">Regresar</a>
	</form>
	<?php  
		}
	?>
</body>
</html>
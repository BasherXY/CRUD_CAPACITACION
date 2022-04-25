<?php 
	$id=$_GET['id'];
	include("conexion.php");

	$sql="delete from alumnos where dni='".$id."'";
	$resultado=mysqli_query($conexion,$sql);

	if($resultado){
			echo "<script language='JavaScript'>
				alert('Los datos fueron eliminados correctamente en la base de datos');
				location.assign('index.php');
				</script>;
			";
		}else{
			echo "<script language='JavaScript'>
				alert('ERROR: Los datos NO fueron eliminados correctamente a la base de datos');
				location.assign('index.php');
				</script>";
			}
?>
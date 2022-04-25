<html>
<head>
	<title>Lista de Alumnos</title>
	<script type="text/javascript">
		function confirmar(){
			return confirm('¿Quieres eliminar los datos de manera permanente? Cualquier dato eliminado no podrá ser recuperado.');
		}
	</script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

	<?php
	include("conexion.php");
	$sql="select * from alumnos";
	$resultado=mysqli_query($conexion,$sql);
	?>

	<h1>Lista de Alumnos</h1>
	<a href="agregar.php">Nuevo alumno</a><br><br>
	<table>
		<thead>
			<tr>
				<th>DNI</th>
				<th>Nombre</th>
				<th>Codigo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

			<?php
			while($filas= mysqli_fetch_assoc($resultado)){
			?>

			<tr>
				<td><?php echo $filas ['DNI']; ?></td>
				<td><?php echo $filas ['Nombre']; ?></td>
				<td><?php echo $filas ['Codigo']; ?></td>
				<td>
					<?php echo "<a href='editar.php?id=".$filas['DNI']."'>EDITAR</a>"; ?>

					 - 

					<?php echo "<a href='eliminar.php?id=".$filas['DNI']."'
					onclick='return confirmar()'click'>ELIMINAR</a>"; ?>
				</td>
			</tr>

			<?php 
			}
			?>
		</tbody>
	</table>
	<? php
	mysqli_close($conexion);
	?>
</body>
</html>
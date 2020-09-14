<?php
	include_once 'php/conexion.php';

	$sentencia_select=$con->prepare('SELECT emp.clave_empleado , emp.nombre , emp.apellido_paterno , emp.apellido_materno , emp.fecha_nacimiento , emp.sueldo , dep.descripcion from emp inner join  dep on emp.departamento = dep.puesto' );
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	

		$select_buscar=$con->prepare('
			SELECT emp.clave_empleado , emp.nombre , emp.apellido_paterno , emp.apellido_materno , emp.fecha_nacimiento , emp.sueldo , dep.descripcion from emp inner join  dep on emp.departamento = dep.puesto'); 
		

		$select_buscar->execute(array(
			':campo' =>"%"."%"
		));

		$resultado=$select_buscar->fetchAll();




	

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Inicio</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Empleados</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Clave Empleado</td>
				<td>Nombre Completo</td>			
			    <td>Departamento</td>
			    <td>Sueldo</td>
				<td>Fecha Nacimiento</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<script type="text/javascript">
		

function myFunction(){


    var opcion = confirm("Estas seguro que quieres eliminar?");
    if (opcion == true) {
    	window.location.href ="http://localhost/ExamenPHP/delete.php?clave_empleado=<?php echo $fila['clave_empleado']; ?>"
	} else {

window.location.href ="http://localhost/ExamenPHP/index.php"

	}



}


	</script>
				

				<tr >
					<td><?php echo $fila['clave_empleado']; ?></td>
					<td><?php echo $fila['nombre'].' '.$fila['apellido_paterno'].' '.$fila['apellido_materno']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['sueldo']; ?></td>
					<td><?php echo $fila['fecha_nacimiento']; ?></td>
					<td><a href="update.php?clave_empleado=<?php echo $fila['clave_empleado']; ?>" class="btn__update" >Editar</a></td>
					<td><a href="delete.php?clave_empleado=<?php echo $fila['clave_empleado']; ?>" class="btn__delete" onmousedown= "myFunction()"  >Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>

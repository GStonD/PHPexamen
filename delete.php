<?php 

	include_once 'php/conexion.php';
	if(isset($_GET['clave_empleado'])){
		$clave_empleado=(int) $_GET['clave_empleado'];
		$delete=$con->prepare('DELETE FROM emp WHERE clave_empleado=:clave_empleado');
		$delete->execute(array(
			':clave_empleado'=>$clave_empleado
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>
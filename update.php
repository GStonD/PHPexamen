<?php
	include_once 'php/conexion.php';
 $mysqli = new mysqli('localhost', 'root', 'root', 'empleadoz');
	if(isset($_GET['clave_empleado'])){
		$clave_empleado=(int) $_GET['clave_empleado'];

		$buscar_id=$con->prepare('SELECT * FROM emp WHERE clave_empleado=:clave_empleado LIMIT 1');
		$buscar_id->execute(array(
			':clave_empleado'=>$clave_empleado
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido_paterno=$_POST['apellido_paterno'];
		$apellido_materno=$_POST['apellido_materno'];
		$fecha_nacimiento=$_POST['fecha_nacimiento'];
		$departamento=$_POST['departamento'];
		$sueldo=$_POST['sueldo'];
		$clave_empleado=(int) $_GET['clave_empleado'];

		if(!empty($nombre) && !empty($apellido_paterno) && !empty($apellido_materno) && !empty($fecha_nacimiento) && !empty($sueldo)  && !empty($departamento)){
			
				$consulta_update=$con->prepare(' UPDATE emp SET  
					nombre =:nombre, 
					apellido_paterno=:apellido_paterno,
					apellido_materno=:apellido_materno,
					fecha_nacimiento=:fecha_nacimiento,
					departamento =:departamento,
					sueldo=:sueldo
					WHERE clave_empleado=:clave_empleado;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre ,
					':apellido_paterno' =>$apellido_paterno,
					':apellido_materno' =>$apellido_materno,
					':fecha_nacimiento' =>$fecha_nacimiento,
					':departamento' =>$departamento,
					':sueldo' =>$sueldo,
					':clave_empleado' =>$clave_empleado
				));
				header('Location: index.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar empleado</title>

<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }




    </script>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Modifica Empleado</h2>
		<form action="" method="post">
			<div class="form-group">
			<h>  nombre   </h>
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text" onkeypress="return soloLetras(event)">
					<h>  apellido paterno   </h>
				<input type="text" name="apellido_paterno" value="<?php if($resultado) echo $resultado['apellido_paterno']; ?>" class="input__text" onkeypress="return soloLetras(event)">
					<h>  apellido materno  </h>
				<input type="text" name="apellido_materno" value="<?php if($resultado) echo $resultado['apellido_materno']; ?>" class="input__text" onkeypress="return soloLetras(event)">
			</div>
			<div class="form-group">

				<div>
	<h> Fecha de Nacimiento</h>
		<input type="date" name="fecha_nacimiento" value = "<?php echo $resultado['fecha_nacimiento']; ?>" >
</div>
			
			<br>				
			<h>  sueldo </h>
				<input type="text" name="sueldo" value="<?php if($resultado) echo $resultado['sueldo']; ?>" class="input__text" >
			</div>
			    <select name = "departamento" value = "<?php echo $resultado['departamento']; ?>">

        <?php

          $query = $mysqli -> query ("SELECT * FROM dep");
          while ($valores = mysqli_fetch_array($query)) {

            echo '<option value="'.$valores[puesto].'">'.$valores[descripcion].'</option>';
          }
        ?>
      </select>
			
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

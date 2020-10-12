<?php 
	include_once 'php/conexion.php';
	
	 $mysqli = new mysqli('localhost', 'root', 'root', 'empleadoz');
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido_paterno=$_POST['apellido_paterno'];
		$apellido_materno=$_POST['apellido_materno'];		
		$fecha_nacimiento=$_POST['fecha_nacimiento'];
		$departamento=$_POST['departamento'];
		$sueldo=$_POST['sueldo'];



	$sentencia_select=$con->prepare('SELECT *FROM dep ORDER BY puesto DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();






	


	
		if(!empty($nombre) && !empty($apellido_paterno) && !empty($apellido_materno) && !empty($fecha_nacimiento) && !empty($sueldo)  && !empty($departamento)){
			
				$consulta_insert=$con->prepare('INSERT INTO emp(nombre,apellido_paterno,apellido_materno,fecha_nacimiento,departamento,sueldo) VALUES(:nombre,:apellido_paterno,:apellido_materno,:fecha_nacimiento,:departamento,:sueldo)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellido_paterno' =>$apellido_paterno,
					':apellido_materno' =>$apellido_materno,
					':fecha_nacimiento' =>$fecha_nacimiento,
					':departamento' =>$departamento,
					':sueldo' =>$sueldo
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
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">

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
</head>
<body>
	

   

	<div class="contenedor">
		<h2>Alta Empleado</h2>

		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text"  onkeypress="return soloLetras(event)" >
				<input type="text" name="apellido_paterno" placeholder="Apellido Paterno" class="input__text" onkeypress="return soloLetras(event)" >
				<input type="text" name="apellido_materno" placeholder="Apellido Materno" class="input__text" onkeypress="return soloLetras(event)">

			</div>
			
<div>
	<h> Fecha de Nacimiento</h>
		<input type="date" name="fecha_nacimiento"  >
</div>
			
			<br>		

				<div class="form-group"> 	
				<input type="text" name="sueldo" placeholder="Sueldo" class="input__text"  >
			</div>

<div>
	<br>
	<select name = "departamento">
        <option value="0">Seleccione Departamento:</option>
        <?php

          $query = $mysqli -> query ("SELECT * FROM dep");
          while ($valores = mysqli_fetch_array($query)) {

            echo '<option value="'.$valores[puesto].'">'.$valores[descripcion].'</option>';
          }
        ?>
      </select>

</div>
       

			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>


  </script>

	
</body>
</html>

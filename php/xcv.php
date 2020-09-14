 <option disabled selected>Selecciona una opción</option>	
<?php 
include("conexion.php");
$getdep1 = "SELECT *FROM dep ORDER BY puesto DESC";
$getdep2 = mysqli_query($getdep1);

while($row = mysqli_fetch_array($getdep2)){

$puesto = $row['puesto'];
$descripcion = $row['descripcion'];

?>
<option value="<?php echo $puesto; ?>"><?php echo $descripcion; ?></option>

<?php

}
	?>				
		
</select>

<select name="departamento" id ="departamento"  >
		 <option disabled selected>Selecciona una opción</option>	
<?php foreach($resultado as $fila):?>
     
		  <option value= "<?php echo $fila['puesto']; ?>"> <?php echo $fila['descripcion']; ?></option>
			
		<?php endforeach ?>
					
		
</select>
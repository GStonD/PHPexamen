<?php
	$database="empleadoz";
	$user='root';
	$password='root';


try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}




?>
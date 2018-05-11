<?php

session_start();

require 'funciones.php';
$errores = '';

$dni = limpiar($_POST['dni']);








try {
	
	$conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');


} catch (Exception $e) {

	echo "Error" .$e->getMessage();;
	
}


	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE dni= :dni');

	$statement->execute( array(
		':dni' => $dni, ));


	


	$result = $statement->fetch();
	if (($result !== false) &&($dni != null)){

		$statementes = $conexion->prepare('DELETE FROM usuarios WHERE dni= :dnis');

		$statementes->execute( array(
		':dnis' => $dni, ));

		echo "<script>alert('Usuario dado de baja.')</script>";
	}

	else {
		echo "<script>alert('Error: Este usuario no existe en la Base de Datos.')</script>";
	}

include ('../sesion/paneladmin.html');

 ?>

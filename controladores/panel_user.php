<?php

session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}



$resulta = '';

$estado = 'pendiente';

#Lista de solicitudes


try {

    $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT * FROM solicitud WHERE estado = :estado ORDER BY dia');

   $statemente->execute(array(
        ':estado' => $estado
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetchALL();


	require '../sesion/listado-turnos.html';







?>
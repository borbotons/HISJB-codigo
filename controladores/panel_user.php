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

    $conexion = new PDO('mysql:host=172.31.130.183 ;dbname=hsjb','wolfwolf','sdb37462532');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT cod_solicitud,paciente,estado,diapedido,descripcion,medico FROM solicitud WHERE estado = :estado ORDER BY paciente');

   $statemente->execute(array(
        ':estado' => $estado
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetchALL();


	require '../sesion/listado-turnos.html';







?>
<?php

session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}


$resultado = '';

$dni = 0;


#Lista de usuarios 


try {

    $conexion = new PDO('mysql:host=172.31.130.183 ;dbname=hsjb','wolfwolf','sdb37462532');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }

   $statemente = $conexion->prepare('SELECT nombrecomp,division,dni,email FROM usuarios WHERE dni!= :dnis ORDER BY nombrecomp');

    $statemente->execute(array(
    ':dnis' => $dni
    ));

   $statemente->execute();

   $resulta = $statemente->fetchALL();



	require '../sesion/listadouser.html';







?>


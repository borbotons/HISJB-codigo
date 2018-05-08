<?php



session_start();


if (!isset($SESSION['usuario'])) {
	
	header('Location:login.php');
}



$resulta = '';


#Lista de solicitudes


try {

    $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');

    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT paciente,estado,diapedido FROM solicitud ORDER BY paciente');


   $statemente->execute();

   $resulta = $statemente->fetchALL();

   require '../sesion/listado-turnos.html';




?>
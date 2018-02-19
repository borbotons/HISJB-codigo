<?php



session_start();


if (!isset($SESSION['usuario'])) {
	
	header('Location:login.php');
}



$resulta = '';


#Lista de solicitudes


try {

        $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT paciente,estado,diapedido FROM solicitudrespaldo ORDER BY paciente');


   $statemente->execute();

   $resulta = $statemente->fetchALL();

   require '../sesion/listado-turnos.html';




?>
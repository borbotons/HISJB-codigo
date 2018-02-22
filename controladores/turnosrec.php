<?php 


session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}



$resulta = '';

$estado = 'rechazado';

$errores = '';

#Lista de solicitudes rechazadas


try {

    $conexion = new PDO('mysql:host=172.31.130.183 ;dbname=hsjb','wolfwolf','sdb37462532');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT cod_solicitud,paciente,diapedido,especialidad,descripcion,medico,dia,horario,observacion,estado FROM solicitud WHERE estado = :estado ORDER BY cod_solicitud');

   $statemente->execute(array(
        ':estado' => $estado
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetchALL();

   if ($resulta == NULL) {

   		 $errores .='<li>Listado vacio: <em>No se encontraron turnos rechazados.</em></li>';
   }
	require '../sesion/listado-turnosrec.html';


?>
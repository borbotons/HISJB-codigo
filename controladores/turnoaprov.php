<?php 

session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}



$resulta = '';

$estado = 'aprobado';

$errores = '';

#Lista de solicitudes aprovadas-->Turnos


try {

        $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT cod_solicitud,paciente,diapedido,especialidad,descripcion,medico,dia,horario,observacion,estado FROM solicitudrespaldo WHERE estado = :estado ORDER BY cod_solicitud');

   $statemente->execute(array(
        ':estado' => $estado
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetchALL();

   if ($resulta == NULL) {

       $errores .='<li>No se encontraron turnos aprobados.</li>';
   }


	require '../sesion/listado-turnosapro.html';






















?>
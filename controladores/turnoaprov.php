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

    $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');
    

    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT cod_solicitud,estado,solicitud.especialidad,descripcion,paciente,solicitud.dni,email,solicitud.telefono,medico,diapreferencia,turnopreferencia,dia,horario,solicitud.direccion,division,observacion,obra_soc,diapedido,fechanac,especialidades.nombre AS especia,medicos.nombre AS nombremed,medicos.apellido AS apellidomed FROM `solicitud` JOIN especialidades ON solicitud.especialidad= especialidades.id_esp JOIN medicos  ON medicos.cod_med=solicitud.medico WHERE estado = :estado ORDER BY dia');

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
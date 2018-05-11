<?php 

$num=$_GET['id'];

session_start();

if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	
}



try {

    $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');

    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }



   $statemente = $conexion->prepare('SELECT cod_solicitud,estado,solicitud.especialidad,descripcion,paciente,solicitud.dni,email,solicitud.telefono,medico,diapreferencia,turnopreferencia,dia,horario,solicitud.direccion,division,observacion,obra_soc,diapedido,fechanac,especialidades.nombre AS especia,medicos.nombre AS nombremed,medicos.apellido AS apellidomed FROM `solicitud` JOIN especialidades ON solicitud.especialidad= especialidades.id_esp JOIN medicos  ON medicos.cod_med=solicitud.medico WHERE cod_solicitud = :id ');

   $statemente->execute(array(
        ':id' => $num
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetch();






    


	require '../sesion/revisolicitud/confturno.html';



?>



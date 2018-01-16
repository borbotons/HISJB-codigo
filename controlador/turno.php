<?php 

#Datos para la solicitud de turno

$medico=$POST['medico'];
$paciente=$POST['paciente'];
$descr=$POST['asunto'];


$dia=$POST['fecha'];
$horario=$POST['hora'];

$division=$POST['division'];
$estado='a confirmar';

$observ='';
$email=$POST['email'];
$telefono_contacto=$POST['tel'];





try{


	$conexion=new PDO('mysql:host=localhost;dbname=hsjb;','root','');

	$statement = $conexion->prepare('INSERT INTO solicitud 
		VALUES(descripcion = :desc,medico = :medico,dia = :fecha,horario = :hora,paciente = :paciente,division =:division,"a confirmar","",email = :email,telefono_cont = :tel)

		');


	$statement->execute(
		$arrayName = array(':desc' => $descr ,':medico' => $medico,':fecha' => $dia,':hora' => $horario,':paciente' => $paciente,':division' =>$division,'' => )
	);

}


?>




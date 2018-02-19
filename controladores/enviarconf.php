<?php 


session_start();


$id = $_POST['numero'];
$desc = $_POST['espec'];
$medi = $_POST['med'];
$dia = $_POST['fechatur'];
$hora = $_POST['horatur'];
$obs = $_POST['observatur'];

$estado='aprobado';




try {

	 $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');

	
 	}catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }




   $statementess = $conexion->prepare('SELECT paciente FROM solicitudrespaldo WHERE cod_solicitud = :id ');

   $statementess->execute(array(
        ':id' => $id
        
    ));


   $statementess->execute();

   $resultass = $statementess->fetch();

   $nombrepac = $resultass['paciente'];

    //esto debe ser un UPDATE con el numero id que tengo y cambiando principalmente el estado y ademas agregar todo esto a la lista de TURNOS que queda asentada dentro de la base de datos.
   $statemente = $conexion->prepare('UPDATE solicitudrespaldo 
   SET estado = :estado, descripcion = :des, medico = :med,dia = :dia, horario = :hora, observacion = :obs                
   WHERE cod_solicitud = :id ');

   $statemente->execute(array(
        ':id' => $id ,
        ':estado' => $estado ,
        ':des' => $desc ,
        ':med' => $medi ,
        ':dia' => $dia ,
        ':hora' => $hora ,
        ':obs' => $obs
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetch();

//esta mal el orden y falta agregar cod de solicitud para estar relacionado

   $statement = $conexion->prepare('INSERT INTO turnos (
    	descripcion, diagnostico, cod_turno, fecha_atencion, hora, medico, paciente, direccion, resultado, obra_soc) VALUES (:des,null,null,:dia,:hora,:med,:pas,null,null,null )');

   $statement->execute(array(
        ':des' => $desc ,
        ':dia' => $dia ,
        ':hora' => $hora ,
        ':med' => $medi ,
        ':pas' => $nombrepac
        
    ));

   $statement->execute();

   $resulta2 = $statement->fetch();


   //Envio de correo tratar que no sea spam

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<H1> Terminado <?php echo $resulta['obs']?></H1>

	<h2> nombre paciente <?php echo $resulta2['pas']?></h2>

	<a href="panel_user.php">Volver</a>
</body>
</html>
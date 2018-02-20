<?php 


session_start();


$id = $_POST['numero'];
$desc = $_POST['espec2'];
$medi = $_POST['med2'];
$dia = $_POST['fechatur'];
$hora = $_POST['horatur'];
$obs = $_POST['observatur'];
$dni = $_POST['dni2'];
$nombrepac = $_POST['nombre2'];




$vacio = '';
$estado ='aprobado';
$estado2 ='rechazado';


//Para Envio del Correo
$correodest = $_POST['email2'];


try {

	 $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');

	
 	}catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }






  if(isset($_POST['boton1'])) 
  { 


   //Accion1 Confirmar

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

   //$statemente->execute();

   $resulta = $statemente->fetch();

//esta mal el orden y falta agregar cod de solicitud para estar relacionado

   $statementz = $conexion->prepare('INSERT INTO turnos (
      cod_turno, cod_solicitud, descripcion, diagnostico, fecha_atencion, hora, medico, paciente, dni, direccion, resultado, obra_soc) VALUES (null,:id,:des,:diag,:dia,:hora,:med,:pas,:dni,:dir,:res,:obr )');

   $statementz->execute(array(
        ':id' => $id  ,
        ':des' => $desc ,
        ':diag' => $vacio ,
        ':dia' => $dia ,
        ':hora' => $hora ,
        ':med' => $medi ,
        ':pas' => $nombrepac ,
        ':dni' => $dni ,
        ':dir' => $vacio ,
        ':res' => $vacio ,
        ':obr' => $vacio 
        
    ));

   //$statement->execute();

   $resulta2 = $statementz->fetch();


   //Envio de correo tratar que no sea spam


  } 




  else if(isset($_POST['boton2'])) 
  { 


  //Accion2 Rechazado

   $statemente = $conexion->prepare('UPDATE solicitudrespaldo 
   SET estado = :estado, descripcion = :des, medico = :med, observacion = :obs                
   WHERE cod_solicitud = :id ');

   $statemente->execute(array(
        ':id' => $id ,
        ':estado' => $estado2 ,
        ':des' => $desc ,
        ':med' => $medi ,
        ':obs' => $obs
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetch();


  }  
 

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
<?php 

#Datos para la solicitud de turno

date_default_timezone_set('America/Argentina/Catamarca');



$estado = 'pendiente';
$espec = $_GET['especia'];
$desc = 'consulta';

$nombrepac = $_GET['nombre'];
$dni = $_GET['numero'];
$email = $_GET['mail'];
$fechanac = $_GET['fechanac'];
$telefono = $_GET['telefono'];
$med = $_GET['med'];
list($prof, $nombre1, $apellido) = explode(" ", $med);


//es conveniente tener un nombre completo y desde alli hacer las busquedas por cualquier letra del nombre completo. busqueda tipo google



$medi = $nombre1.' '.$apellido;
$diapref = $_GET['diamed'];
$turnopre = $_GET['turn'];

$dia = date('m/d/y');

$hora = date('g:ia');

$direccion = $_GET['domicilio'];
$vacio = '';
$obrasocial = $_GET['obra_soci'];

$diaservidor = date('Y-m-d');





try {
	
		 $conexion = new PDO('mysql:host=172.31.130.183 ;dbname=hsjb','wolfwolf','sdb37462532');
	
		
		 }catch(PDOException $e){
	
		   echo "Error:" .$e->getMessage();;
		}
	
		$statement = $conexion->prepare('INSERT INTO solicitud (
			cod_solicitud, estado, especialidad, descripcion, paciente, dni, email, telefono, medico, diapreferencia, turnopreferencia, dia, horario, direccion, division, observacion, obra_soc, diapedido, fechanac  ) VALUES (null,:est,:espe,:desr,:pac,:dni,:email,:tel,:med,:diapre,:turnopre,:dia,:hora,:dir,:divi,:obser,:obr,:diaped,:fechanac )');
	  
			$statement ->execute(array(
				':est' => $estado  ,
				':espe' => $espec ,
				':desr' => $desc ,
				':pac' => $nombrepac ,
				':dni' => $dni ,
				':email' => $email ,
				':tel' => $telefono ,
				':med' => $medi ,
				':diapre' => $diapref ,
				':turnopre' => $turnopre ,
				':dia' => $dia ,
				':hora' => $hora ,
				':dir' => $direccion ,
				':divi' => $vacio ,
				':obser' => $vacio ,
				':obr' => $obrasocial ,
				':diaped' => $diaservidor ,
				':fechanac' => $fechanac
				
				
			));
		
		 //$statement->execute();
	  
		 $resulta2 = $statement->fetch();
		  //resulta2 siempre sera negativo porque no devuelve nada

		  header( "refresh:0;http://www.hisjb.com.mialias.net/HISJB-codigo/index.html" );
		  echo "<script>alert('Turno Solicitado.');</script>";
		
	  



?>


<?php 

$num=$_GET['id'];

session_start();

if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	
}



try {

        $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }



   $statemente = $conexion->prepare('SELECT * FROM solicitudrespaldo WHERE cod_solicitud = :id ');

   $statemente->execute(array(
        ':id' => $num
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetch();






    


	require '../sesion/revisolicitud/confturno.html';



?>



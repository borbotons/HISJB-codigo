<?php


	session_start();

	require 'funciones.php';
	$errores = '';

//	if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $usuario = filter_var(limpiar($_POST['usuario']), FILTER_SANITIZE_STRING);
    $pass = limpiar($_POST['password']);
    $nombrecomp = $_POST['nombrecomp'];
    $division = limpiar($_POST['division']);
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    //$pass = hash('sha512', $pass);

   // echo '<h1>'.$usuario.$pass.$nombrecomp.'</h1>';

    try {

        $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');

    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }

    $statement = $conexion->prepare('INSERT INTO usuarios (
    	usuario, pass, idusuario, division, nombrecomp, dni, email, tipo) VALUES (:usuario,:pass,null,:div,:nomb,:dni,:email,:tipo )');


    $statement->execute(array(
        ':usuario' => $usuario,
        ':pass' => $pass,
        ':div' => $division,
        ':nomb' => $nombrecomp,
        ':dni' => $dni,
        ':email' => $email,
        ':tipo' => $tipo 
         ));

   // echo "<script>alert('Usuario creado con exito')</script>";

    $statemente = $conexion->prepare('SELECT * FROM usuarios WHERE dni= :dnis ');

    $statemente->execute(array(
    ':dnis' => $dni
    ));

    $resultado = $statemente->fetch();
    if(($resultado !== false)&&($dni != null)){

   
 	echo "<script>alert('Usuario creado con exito')</script>";

    }
    else{

    	echo "<script>alert('Error el usuario no pudo darse de alta')</script>";
       

    }
    
    	
    	 //$errores .='<li>Error el usuario no pudo darse de alta.!!</li>';

	

	

include('../sesion/paneladmin.html');
	
?>
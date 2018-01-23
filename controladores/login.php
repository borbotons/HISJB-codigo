<?php 



session_start();

require 'funciones.php';

comprobar_ses_norm();

$errores = '';

if($_SERVER['REQUEST_METHOD']) =='POST'){


    $usuario = filter_var(limpiar($_POST['usuario']), FILTER_SANITIZE_STRING);
    $pass = limpiar($_POST['password']);
    //$pass = hash('sha512', $pass);

    try {

        $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario= :usuario AND pass= :passw');

    $statement->execute(array(
        ':usuario' => $usuario,
        ':passw' => $pass
    ));

    $resultado = $statement->fetch();
    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        header('Location: /admin');

    } else{

        $errores .='<li>La contrasenia y/o usuario son incorrectos</li>';
    }


    

}

require '../../atencion.html';
















?>
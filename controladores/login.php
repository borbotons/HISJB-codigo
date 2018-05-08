<?php 



session_start();

if(isset($_SESSION['usuario'])&&($_SESSION['tipo'] != 'admin'))
{
    header('Location:panel_user.php');
}
if(isset($_SESSION['usuario'])&&($_SESSION['tipo'] == 'admin'))
{
    header('Location:panel_admin.php');
}


require 'funciones.php';

//comprobar_ses_norm();

$errores = '';




if (($_SERVER['REQUEST_METHOD'] =='POST')&&( $_POST['usuario'] != null)){


    $usuario = filter_var(limpiar($_POST['usuario']), FILTER_SANITIZE_STRING);
    $pass = limpiar($_POST['password']);
    //$pass = hash('sha512', $pass);

    try {

        $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');


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
        $_SESSION['tipo'] = $resultado['tipo'];

                if ($_SESSION['tipo'] == 'admin') {
                    header('Location: panel_admin.php');
                     }
                     
                     else
                     {
                    header('Location: panel_user.php');
                     }
                 








    } else{

        $errores .='<li>La contrasenia y/o usuario son incorrectos</li>';
    }

    
    


}






include '../atencion.html';














?>
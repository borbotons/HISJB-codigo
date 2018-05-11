<?php


function conexion($db_conf){

try{
    $conexion = new PDO('mysql:host=localhost;dbname='.$bd_conf['basedatos'],$db_conf['usuario'], $db_conf['pass']);
    return $conexion;

}catch(PDOException $e){
    return false;
}


}

function limpiar($datos){

    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;


}

function comprobar_ses_norm(){

    if(isset($_SESSION['usuario'])){
        
        
        header('Location:/admin');
        
        }
}






?>
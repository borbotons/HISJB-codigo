<?php

session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}

if(isset($_SESSION['usuario'])&&($_SESSION['tipo'] != 'admin'))
{
    header('Location:panel_user.php');
}
//if(isset($_SESSION['usuario'])&&($_SESSION['tipo'] == 'admin'))
//{
  //  header('Location:panel_admin.php');
//}

require '../sesion/paneladmin.html';







//Probamos la funcion para el primer modal1





?>
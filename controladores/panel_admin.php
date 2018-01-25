<?php

session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}


require '../sesion/paneladmin.html';







//Probamos la funcion para el primer modal1





?>
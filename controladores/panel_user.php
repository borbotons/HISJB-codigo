<?php

session_start();


if (!isset($_SESSION['usuario'])) {

	header('location:login.php');
	# code...
}


require '../sesion/listado-turnos.html';







?>
<?php 



$host = 'localhost';
$dbname = 'hsjb';
$dbuser = 'root';
$dbpass = '';


try {


	$dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$dbuser,$dbpass);
	$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $ex) {

	die($ex->getMessage());
	
}










?>

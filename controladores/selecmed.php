<?php 


$espec_med=$_POST['cod_banda'];


try {


	$conex = new PDO('mysql:host=172.31.130.183 ;dbname=hsjb','wolfwolf','sdb37462532');

	$statement = $conex->prepare('SELECT nombre,apellido,sexo FROM medicos WHERE especialidad=:espec');

	$statement->execute(
 	array(':espec'=> $espec_med)
 	);


	echo '<h1>'.'Valores'.'</h1>';
	echo '<br>'.'Datos'.$espec_med.'lala';



	$resultado=$statement->fetchALL();

	


	
} catch (Exception $e) {

	die($e->getMessage());
	
}












?>



<?php foreach ($resultado as $res2 ) {?>

	<?php if ($res2['sexo']=='masculino') { ?>

	<?php echo '<option>'.'Doctor'.' '.$res2['nombre'].' '.$res2['apellido'].'</option>';?>

	<?php } ?>

	<?php if ($res2['sexo']=='femenino') { ?>

	<?php echo '<option>'.'Doctora'.' '.$res2['nombre'].' '.$res2['apellido'].'</option>';?>	

	<?php } ?>

<?php } ?>

?>
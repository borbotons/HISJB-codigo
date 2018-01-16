<?php 


$espec_med="cardiologia";


try {


	$conex = new PDO('mysql:host=localhost;dbname=hsjb','root','');

	$statement = $conex->prepare('SELECT nombre,apellido FROM medicos WHERE especialidad = :espec');

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



<table border="1">

<tr>
<th>nombre</th>
<th>apellido</th>
</tr>

<?php foreach ($resultado as $res ) {?>

<tr>
<td><?php echo $res['nombre']; ?></td>
<td><?php echo $res['apellido']; ?></td>
</tr>

<?php } ?>

</table>
<?php 


$dia_med=$_POST['cod_banda'];
//aca seria bueno que el apellido o apellidos vengan separados por una coma y listo eso seria todo para usar esta funcion.
list($prof, $nombre1, $apellido) = explode(" ", $dia_med);
//echo $nombre1; // nombre
//echo $apellido; // apellido
try {


	$conex = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hsjb','wi871598_hsjb','22puGAkori');

	$statement = $conex->prepare('SELECT apellido,dia1atenc,dia2atenc,dia3atenc,dia4atenc,dia5atenc FROM medicos WHERE nombre=:espec');

	$statement->execute(
 	array(':espec'=> $nombre1)
 	);


	echo '<h1>'.'Valores'.'</h1>';
	echo '<br>'.'Datos'.$dia_med.'lala';
	echo '<br>'.'Datos'.$nombre1.'lala';
	echo '<br>'.'Datos'.$apellido.'lala';



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


<select>
<?php foreach ($resultado as $res2 ) {?>

	

<?php } ?>




<? if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')&&($res2['dia3atenc']!= '')&&($res2['dia4atenc']!= '')&&($res2['dia5atenc']!= '')){?>
	<?php foreach ($resultado as $res5 ) {?>


	<?php echo '<option>'.' '.$res5['dia1atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res5['dia2atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res5['dia3atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res5['dia4atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res5['dia5atenc'].' </option>';?>

	<?php } ?>
	
<?php return;} ?>

</select>


<select>
<?php foreach ($resultado as $res2 ) {?>

	

<?php } ?>




<? if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')&&($res2['dia3atenc']!= '')&&($res2['dia4atenc']!= '')){?>
	<?php foreach ($resultado as $res4 ) {?>


	<?php echo '<option>'.' '.$res4['dia1atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res4['dia2atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res4['dia3atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res4['dia4atenc'].' </option>';?>
	

	<?php } ?>
	
<?php return;} ?>

</select>





<select>
<?php foreach ($resultado as $res2 ) {?>

	

<?php } ?>



<? if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')&&($res2['dia3atenc']!= '')){?>
	<?php foreach ($resultado as $res3 ) {?>


	<?php echo '<option>'.' '.$res3['dia1atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res3['dia2atenc'].' </option>';?>
	<?php echo '<option>'.' '.$res3['dia3atenc'].' </option>';?>
	

	<?php } ?>

<?php return;} ?>

</select>











?>
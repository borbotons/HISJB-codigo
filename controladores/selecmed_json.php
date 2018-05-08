<?php

//Utilizando JSON para intercambio de info


$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('hsjb') or die('No se pudo seleccionar la base de datos');
 
$query="SELECT nombre,apellido,sexo,cod_med FROM medicos WHERE especialidad=".$_REQUEST["especialid"]." ORDER BY apellido";
$result = mysql_query($query)
        or die("Ocurrio un error en la consulta SQL");
mysql_close();
 
$regiones = array();
while (($fila = mysql_fetch_array($result)) != NULL) {

		
			$regiones[$fila['cod_med']] = 'Dra'.$fila['apellido'].','.$fila['nombre'];
		
    
}
print_r(json_encode($regiones));
 
// Liberar resultados
mysql_free_result($result);
 
// Cerrar la conexión
mysql_close($link);


 ?>
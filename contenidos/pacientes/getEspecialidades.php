<?php


$mysqli = new mysqli("localhost", "wi871598_hosp", "50GIniduru", "wi871598_hosp");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}





$consulta2 = "SELECT id_esp,nombre FROM especialidades ORDER BY nombre";



$resultadoz = $mysqli->query($consulta2);

echo '<option disabled>Seleccionar</option>';

foreach ($resultadoz as $fila ) {
	echo '<option value="'.$fila["id_esp"].'">'.$fila["nombre"].'</option>';
}
 
// Liberar resultados
mysqli_free_result($resultadoz);

// Cerrar la conexión
mysqli_close($mysqli);

?>

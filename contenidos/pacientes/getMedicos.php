<?php

$mysqli = new mysqli("localhost", "wi871598_hosp", "50GIniduru", "wi871598_hosp");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$consulta2 = "SELECT cod_med,nombre,apellido,sexo FROM medicos WHERE especialidad=".$_REQUEST["especi"]." ORDER BY apellido";



$resultadoz = $mysqli->query($consulta2);


echo '<option disabled>Seleccionar</option>';
foreach ($resultadoz as $fila ) {
    if($fila["sexo"]=='masculino')
    {echo '<option value="'.$fila["cod_med"].'">'.'Dr '.$fila["apellido"].' '.$fila["nombre"].'</option>';}

    else{echo '<option value="'.$fila["cod_med"].'">'.'Dra '.$fila["apellido"].' '.$fila["nombre"].'</option>';}

}

//echo '<option value="'.$fila["cod_med"].'">'.$fila["apellido"].','.$fila["nombre"].'</option>';

// Liberar resultados
mysqli_free_result($resultadoz);

// Cerrar la conexión
mysqli_close($mysqli);

?>

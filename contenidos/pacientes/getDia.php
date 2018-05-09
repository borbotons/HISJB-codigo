<?php



$mysqli = new mysqli("localhost", "wi871598_hosp", "50GIniduru", "wi871598_hosp");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$consulta2 = "SELECT dia1atenc,dia2atenc,dia3atenc,dia4atenc,dia5atenc,cod_med FROM medicos WHERE cod_med=".$_REQUEST["med"]."";



$resultadoz = $mysqli->query($consulta2);

echo '<option disabled>Seleccionar</option>';

foreach ($resultadoz as $res2){
}

if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')&&($res2['dia3atenc']!= '')&&($res2['dia4atenc']!= '')&&($res2['dia5atenc']!= '')){
	foreach ($resultadoz as $res5 ) {
        echo '<option value="'.$res5["dia1atenc"].'">'.$res5["dia1atenc"].'</option>';
        echo '<option value="'.$res5["dia2atenc"].'">'.$res5["dia2atenc"].'</option>';
        echo '<option value="'.$res5["dia3atenc"].'">'.$res5["dia3atenc"].'</option>';
        echo '<option value="'.$res5["dia4atenc"].'">'.$res5["dia4atenc"].'</option>';
        echo '<option value="'.$res5["dia5atenc"].'">'.$res5["dia5atenc"].'</option>';
    }
return;
}

if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')&&($res2['dia3atenc']!= '')&&($res2['dia4atenc']!= '')){
	foreach ($resultadoz as $res4 ) {
        echo '<option value="'.$res4["dia1atenc"].'">'.$res4["dia1atenc"].'</option>';
        echo '<option value="'.$res4["dia2atenc"].'">'.$res4["dia2atenc"].'</option>';
        echo '<option value="'.$res4["dia3atenc"].'">'.$res4["dia3atenc"].'</option>';
        echo '<option value="'.$res4["dia4atenc"].'">'.$res4["dia4atenc"].'</option>';
    }
return;
}

if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')&&($res2['dia3atenc']!= '')){
	foreach ($resultadoz as $res3 ) {
        echo '<option value="'.$res3["dia1atenc"].'">'.$res3["dia1atenc"].'</option>';
        echo '<option value="'.$res3["dia2atenc"].'">'.$res3["dia2atenc"].'</option>';
        echo '<option value="'.$res3["dia3atenc"].'">'.$res3["dia3atenc"].'</option>';
        
    }
return;
}

if(($res2['dia1atenc']!= '')&&($res2['dia2atenc']!= '')){
	foreach ($resultadoz as $res21 ) {
        echo '<option value="'.$res21["dia1atenc"].'">'.$res21["dia1atenc"].'</option>';
        echo '<option value="'.$res21["dia2atenc"].'">'.$res21["dia2atenc"].'</option>';        
    }
return;
}

if($res2['dia1atenc']!= ''){
	foreach ($resultadoz as $res11 ) {
        echo '<option value="'.$res11["dia1atenc"].'">'.$res11["dia1atenc"].'</option>';
    }
return;
}






// Liberar resultados
mysqli_free_result($resultadoz);

// Cerrar la conexión
mysqli_close($mysqli);

?>




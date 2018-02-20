<?php 


ob_start();

session_start();
//$nombrepdf = $_GET['fecha'];

$nombrepdf = getdate();







$estado = 'pendiente';

#Lista de solicitudes


try {

        $conexion = new PDO('mysql:host=localhost;dbname=hsjb','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT paciente,estado,diapedido FROM solicitudrespaldo WHERE estado = :estado ORDER BY paciente');

   $statemente->execute(array(
        ':estado' => $estado
        
    ));

   $statemente->execute();

   $resulta = $statemente->fetchALL();

?>


<!DOCTYPE html>
<html>
<head>
	<title>ArchivoPdf</title>
  <link rel="stylesheet" type="text/css" href="../css/imprimir.css">
</head>
<body>

				<h1 align="center">Lista de Turnos</h1>
				<h2 align="center">Hospital San Juan Bautista</h2>
             	 <table class="table table-striped table-hover">
                    <tr>
                      <th>Nombre y Apellido</th>
                      <th><br></th>
                      <th>Estado</th>
                      <th><br></th>
                      <th>Fecha peticion</th>
                      
                    </tr>
                    <?php foreach ($resulta as $result ) { ?>
                    <tr>
                      <td><?php echo $result['paciente']; ?></td>
                      <th><br></th>
                      <td><?php echo $result['estado']; ?></td>
                      <th><br></th>
                      <td><?php echo $result['diapedido']; ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                      <td>Chayle Facundo L.</td>
                      <th><br></th>
                      <td>Pendiente</span></td>
                      <th><br></th>
                      <td>Dec 13, 2016</td>
                      
                    </tr>
          
              </table>

</body>
</html>



<?php

require_once("../exportarpdf/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename =  $nombrepdf['mday'] . '_' . $nombrepdf['month'] . '_' . $nombrepdf['year'] . '_' . $_SESSION['usuario'];
$dompdf->stream($filename,  array("Attachment" => 0 ));







?>
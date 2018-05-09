<?php 


ob_start();

session_start();
//$nombrepdf = $_GET['fecha'];

$nombrepdf = getdate();




$fecha = $nombrepdf['mday'] . ' ' . $nombrepdf['month'] . ' ' . $nombrepdf['year'];


$estado = 'pendiente';

#Lista de solicitudes


try {

    $conexion = new PDO('mysql:host=127.0.0.1;dbname=wi871598_hossjb','wi871598_hsjb17','Hospitalsanjuan17');
    
    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
    #Podemos ordenar mediante el dia y hora...
   $statemente = $conexion->prepare('SELECT paciente,estado,diapedido FROM solicitud WHERE estado = :estado ORDER BY paciente');

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


    <link rel="stylesheet" href="../css/archivopdf.css">
</head>
<body>
    <div class="container-fluid">
      <div class="container">
        <div class="row titular">
          <div class="col-md-4">
              <h3><i class="fas fa-plus"></i> Listado de Turnos</h3>
          </div>
          <div class="col-md-4"></div>  
          <div class="col-md-4" class="fecha">
              <p class="lead">Fecha: <?php echo $fecha ?> </p>
          </div>
        </div>
        <div class="row subtitular ">
            <div class="col-md-4">
                <p class="lead">Hospital San Juan Bautista</p>
            </div>
            
        </div>
      </div>
    </div>
    
    <div class="container">
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

            
      </table>
    </div>
               

    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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
<?php


$emisor = $_POST['nombre1'];
$correoemisor = $_POST['habitacion'];
$asunto = $_POST['servicio1'];
$mensajeC = $_POST['comments'];

$respuestacorreo='';
include("phpmailer.php");

$smtp=new PHPMailer();

# servidor SMTP
$smtp->IsSMTP();

# formato del correo con UTF-8
$smtp->CharSet="UTF-8";

# autenticación
$smtp->SMTPAuth   = true;						
$smtp->SMTPSecure = 'tsl';       

$smtp->Host       = 'mail.hospitalsanjuanbautista.org';			
$smtp->Username   = "contacto@hospitalsanjuanbautista.org";	// correo usuario
$smtp->Password   = "Hospital2018";			// pass usuario
$smtp->Port       =  587;


# datos de quien realiza el envio
$smtp->From       = "contacto@hospitalsanjuanbautista.org"; 
$smtp->FromName   = "Consulta desde web HSJB Catamarca"; 

# Indicamos las direcciones donde enviar el mensaje con el formato
#   "correo"=>"nombre usuario"
# Se pueden poner tantos correos como se deseen
$mailTo=array(
    
    
     "contacto@hospitalsanjuanbautista.org" => "Consulta desde la Web" , "danieltesorero2009@gmail.com" => "Contactos" , "emi_andalgala@hotmail.com" => "InfoConsulta" ,
    
);

$smtp->WordWrap   = 50; // set word wrap

$smtp->AltBody = 'This is a plain-text message body';
# NOTA: Los correos es conveniente enviarlos en formato HTML y Texto para que
# cualquier programa de correo pueda leerlo.

# Definimos el contenido HTML del correo
$contenidoHTML="<head>";
$contenidoHTML.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
$contenidoHTML.="<style media='screen'> ";
$contenidoHTML.="*{";
$contenidoHTML.="  margin: 0;";
$contenidoHTML.="}";
$contenidoHTML.=".contenedor{";
    $contenidoHTML.="  background: #f7f7f7;";
    $contenidoHTML.="  width: 800px;";
    $contenidoHTML.="  padding-left: 50px;";
    $contenidoHTML.="  padding-right: 50px;";
    $contenidoHTML.="  padding-top: 30px;";
    $contenidoHTML.="  padding-bottom: 50px;";
    $contenidoHTML.="}";
    $contenidoHTML.=".cabecera{";
        $contenidoHTML.="  margin: 0 auto;";
        $contenidoHTML.="  width: 700px;";
        $contenidoHTML.="}";
        $contenidoHTML.=".cabecera img{";
            $contenidoHTML.="  width: 700px;";
            $contenidoHTML.="}";
            $contenidoHTML.=".cuerpo{";
                $contenidoHTML.="  background: white;";
                $contenidoHTML.="  max-width: 600px;";
                $contenidoHTML.="  margin: 0 auto;";
                $contenidoHTML.="  padding-top: 20px;";
                $contenidoHTML.="  padding-bottom: 20px;";
                $contenidoHTML.="  padding-left: 20px;";
                $contenidoHTML.="  padding-right: 20px;";
                $contenidoHTML.="}";
                $contenidoHTML.=".cuerpo img{";
                    $contenidoHTML.="  margin-bottom: 30px;";
                    $contenidoHTML.="}";
                    $contenidoHTML.=".cuerpo h3{";
                        $contenidoHTML.="  font-family: Roboto,'Helvetica Neue',Helvetica,Arial,sans-serif;";
                        $contenidoHTML.="  color: #3e6bfd;";
                        $contenidoHTML.="  font-weight: bold;";
                        $contenidoHTML.="  text-align: center;";
                        $contenidoHTML.="}";
                        $contenidoHTML.=".cuerpo p {";
                            $contenidoHTML.="  margin-top: 20px;";
                            $contenidoHTML.="  color: #7e7e7e;";
                            $contenidoHTML.="  font-family: Roboto,'Helvetica Neue',Helvetica,Arial,sans-serif;";
                            $contenidoHTML.="  text-align: left;";
                            $contenidoHTML.="  font-size: 16px;";
                            $contenidoHTML.="  line-height: 150%;";
                            $contenidoHTML.="}";
                            $contenidoHTML.="</style>";
                            $contenidoHTML.="</head>";
                            $contenidoHTML.="<body>";
                            $contenidoHTML.="<div class='contenedor'>";
                            $contenidoHTML.="<div class='cuerpo'>";
                            $contenidoHTML.="  <div class=''>";
                            $contenidoHTML.="    <img src='http://www.hospitalsanjuanbautista.org/img/isologo_150.png'>";
                            $contenidoHTML.="  </div>";
                            $contenidoHTML.="  <div class=''>";
                            $contenidoHTML.="    <h3>Titulo del email</h3>";
                            $contenidoHTML.="  </div>";
                            $contenidoHTML.="  <div class=''>";
                            $contenidoHTML.="    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod";
                            $contenidoHTML.="      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,";
                            $contenidoHTML.="       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
                            $contenidoHTML.="       Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu";
                            $contenidoHTML.="       fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,";
                            $contenidoHTML.="       sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
                            $contenidoHTML.="       <p>Hospital Interzonal San Juan Bautista</p>";
                            $contenidoHTML.="  </div>";
                            $contenidoHTML.="</div>";
                            $contenidoHTML.="<div class='pie'>";
                            $contenidoHTML.="</div>";
                            $contenidoHTML.="</div>";
                            $contenidoHTML.="</body>";

# Definimos el contenido en formato Texto del correo
$contenidoTexto="Contenido en formato Texto";
$contenidoTexto.= "Este mensaje fue enviado por " . $emisor . ",\r\n";
$contenidoTexto.= "Su e-mail es: " . $correoemisor . " \r\n";
$contenidoTexto.= "Asunto: " . $asunto . " \r\n";
$contenidoTexto.= "Mensaje: " . $mensajeC . " \r\n";
$contenidoTexto.= "Enviado el " . date('d/m/Y', time());
$contenidoTexto.="\n\nhttp://www.hospitalsanjuanbautista.org/";

# Definimos el subject
$smtp->Subject="Consulta a través del sitio web Hospital Interzonal San Juan Bautista";



# Indicamos el contenido
$smtp->AltBody=$contenidoTexto; //Text Body
$smtp->MsgHTML($contenidoHTML); //Text body HTML

foreach($mailTo as $mail=>$name)
{
    $smtp->ClearAllRecipients();
    $smtp->AddAddress($mail,$name);

    if(!$smtp->Send())
    {
         echo "<br>Error (".$mail."): ".$smtp->ErrorInfo;

         echo "<script>alert('!Error,Por favor intente de nuevo ¡Gracias!.');</script>";         
         header('location:../index.html');
         
    }else{
         echo "<br>Envio realizado a ".$name." (".$mail.")";
         echo "<script>alert('Mensaje Enviado.');</script>";         
         
         header('location:../index.html');
    }
}



?>


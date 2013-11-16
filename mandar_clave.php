<html>
<head>
	<title>

	</title>

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 		
    <link rel="stylesheet" type="text/css" href="css/style.css" />	
</head>

<?php

// headers
session_start();
require_once("funciones_ugm.php");
connect_to_db();

 
//POST and GET
$email = $_POST['email'];


//obtener datos de autor a apartir del correo electronico
$result = mysql_query("select * from asistentes_ugm where correo = 'alejandro.lopez.lara@gmail.com'");
$datos_autor = mysql_fetch_array($result);
//printf("numero: %s -",mysql_num_rows($result));
//printf("email:%s -",$email);
//printf("membresia:%s-",$datos_autor['id_membresia']);
$clave = $datos_autor['id_membresia'] . '%';

$result = mysql_query("select * from resumen_ugm where clave LIKE '$clave'");
 

 

//printf("%s",$message);


//fill parameters
$to = 'alara@cicese.mx';
$subject = 'Clave para resumen de UGM';
//$message = 'Este es un mensaje de la UGM';
    $headers    = array
    (
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset="UTF-8";',
        'Content-Transfer-Encoding: 7bit',
        'Date: ' . date('r', $_SERVER['REQUEST_TIME']),
        'Message-ID: <' . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
        'X-Mailer: PHP v' . phpversion(),
        'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'],
    );


//printf(var_dump(mail($to, $subject, $message, $headers)));

?>
<body> 
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">	

        <?php
if ( $claves = mysql_fetch_array($result)){
do {

//printf("%s\n",$claves['clave']);

$message = $message . "Resumen: " . $claves['titulo'] . "<br/>" . "Clave: " . $claves['clave'] . "<br/><br/>";
       
}while ($claves = mysql_fetch_array($result));
}




        ?>

        <div class="div_878" id="texto_mandar_clave"><p class="center"> <?php printf("%s",$message);?> con la clave de tu resumen</p></div>


        <div class="center" id="liga_regresar_mandar_clave"><a   href="login_editar_resumen.php">REGRESAR</a></div>

      </div>
 


  <div id="footer">

    <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
    <p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>

  </div>

</div>


</body>

</html>
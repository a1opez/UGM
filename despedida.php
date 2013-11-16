<?php
header('Content-Type: text/html; charset=ISO-8859-1'); 
session_start();
require_once("funciones_ugm.php");
 
   connect_to_db();
   
   
$id_membresia = $_GET['id_membresia'];  
$id_resumen = $_GET['id_resumen'];
//$flag = $_GET['creacion'];  
?>


<html>
<head>
	<title>

	</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
</head>

<?php


$result = mysql_query("SELECT * FROM asistentes_ugm where id_membresia ='$id_membresia' ", $db);
$row = mysql_fetch_array($result);

$clave_resumen = $id_membresia . '-' . $id_resumen . '-13';

$result = mysql_query("update resumen_ugm set clave = '$clave_resumen' where id_resumen = '$id_resumen'");
 
?>
<body>
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  	
  		</div>
  		
  		<div id="main">
  		
  		<div id="titulo_despedida">Resumen Recibido</div>
  		
<div class="despedida_texto">
Recibimos su resumen para la Reuni&oacute;n Anual 2013 de la Union Geofisica Mexicana. Usted puede actualizarlo/consultarlo en la secci&oacute;n de Resumenes de la pagina de la Reunion:
</div>

<div class="despedida_link">
<a href="http://www.ugm.org.mx/raugm">http://www.ugm.org.mx/raugm</a>
</div>		

<div class="despedida_texto">
El Acceso y Clave para actualizar su resumen es: 
</div>  		

<div class="despedida_texto">
Acceso: <?php  printf("%s ",$row["correo"]);  ?> 
</div>
<div class="despedida_texto">
Clave: <?php printf("%s", $clave_resumen); ?>
</div>
<div class="despedida_texto">
gracias por su participacion.
</div>
<div class="despedida_link">
<a href="http://www.ugm.org.mx/raugm">http://www.ugm.org.mx/raugm</a>
</div>
<div class="despedida_link">
<a href="menu_ugm.php">REGRESAR</a>
</div>
  		</div>
  		
  		        
         <div id="footer">

<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>
         </div>        
        
     </div>
 

         
 
  		
  		
  		
  		
  		
  		
  		 
</body>


</html>  

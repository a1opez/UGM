<html>
<head>
	<title>

	</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
</head>

<body> 
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">	
<div class="page_title2">
ORGANIZAR RESUMENES

</div>
   <div id="back_ver_resumenes"><a href="menu_ugm.php"><button class="boton_regresar">REGRESAR</button></a></div>
<div id="lista_sesiones">
  Has click en alguna de las sesiones para ver la lista de resumenes que contiene
</div>
<!--<a href="mostrar_todos_resumenes.php">Ver todos los resumnenes</a>  	-->		
<?php
header('Content-Type: text/html; charset=ISO-8859-1');

// headers
session_start();
require_once("funciones_ugm.php");





 
   connect_to_db();



 $result = mysql_query("select * from sesiones_ugm");


printf("<ul>");

if ( $sesiones_row = mysql_fetch_array($result)){
do {

//$nombre_sesion = $sesiones_row["nombre"];
printf("<li>");
printf("<a id=\"item_sesion\" href=\"resumen_sesion.php?id_sesion=$sesiones_row[id_sesion]\"> %s </a>",$sesiones_row["nombre"]);
printf("</li>"); 

}while ($sesiones_row = mysql_fetch_array($result));

}

printf("</ul>");  
//printf("hola mundo");



?>

</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
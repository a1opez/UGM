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
<div class="div_800">Buscar resumen por nombre o apellido</div>

<div class="div_878">
  
  <div class="div_500">
  <form name="form" method="get" action="ver_resumenes.php" accept-charset="ISO-8859-1">
  <div class="div_800"><input type="text" name="busqueda" id="busqueda"></div>
  <input type="hidden" name="flag" value="busqueda_por_nombre">
  <div class="div_800"><input type="submit"></div>
  </form>
  </div>
  <div id="back_ver_resumenes"><a href="menu_ugm.php"><button class="boton_regresar">REGRESAR</button></a></div>
</div>

 
<ul>  			
<div class="div_219">Codigo</div>
<div class="div_500">Nombre</div>
<div class="div_219">Tipo</div>
<!--<div class="div_219"></div>-->

<?php
header('Content-Type: text/html; charset=ISO-8859-1');



// headers
session_start();
require_once("funciones_ugm.php");


 
   connect_to_db();

 $result = mysql_query("select * from sesiones_ugm");

$flag = "busqueda_por_sesion";
 

if ( $sesiones_row = mysql_fetch_array($result)){
do {

//$nombre_sesion = $sesiones_row["nombre"];
printf("<li>");
printf("<div class=\"div_219\">$sesiones_row[id_sesion]</div>");
printf("<div class=\"div_500\"><a href=\"ver_resumenes.php?id_sesion=$sesiones_row[id_sesion]&flag=$flag\"> %s </a></div>",$sesiones_row["nombre"]);
printf("<div class=\"div_219\">$sesiones_row[tipo]</div>");
printf("</li>"); 

}while ($sesiones_row = mysql_fetch_array($result));

}

 


?>
</ul>

</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
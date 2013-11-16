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
 <div class="div_878">Buscar resumen por nombre o apellido</div>
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
<li><div class="div_878"><p>Lista de resumenes:</p></li>
</ul>
<div class="encabezado">
<div class="div_100">Orden</div>
<div class="div_100">ID</div>
<div class="div_400">Titulo</div>
<div class="div_250">Autores</div>
<div class="div_100">Carta</div>
</div>
<ul>
 
<?php
header('Content-Type: text/html; charset=ISO-8859-1');



// headers
session_start();
require_once("funciones_ugm.php");

 
   connect_to_db();
//GET and POST receive

  $id_sesion = $_GET['id_sesion'];
  $flag = $_GET['flag'];
  $busqueda = $_GET['busqueda'];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// header de los resultados
/////////////////////////////////////////////////////////////////////////////////////////////////////////////// 



////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Busqeuda Por sesion
///////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ($flag == "busqueda_por_sesion"){
//printf('%s',$flag);
//printf('%s',$id_sesion );
$result = mysql_query("select * from resumen_ugm  where id_sesion = '$id_sesion' order by numero"); 



if ( $resumenes = mysql_fetch_array($result)){
 
do{
$nombre_completo = "";	
$result2 = mysql_query("select asistentes_ugm.id_asistente, asistentes_ugm.nombre, asistentes_ugm.paterno, asistentes_ugm.materno
	                   from resumen_ugm inner join autores_ugm on
	                   resumen_ugm.id_resumen = autores_ugm.id_resumen
	                   inner join asistentes_ugm on
	                   autores_ugm.id_asistente = asistentes_ugm.id_asistente
	                   where resumen_ugm.id_resumen = '$resumenes[id_resumen]'");

  if ( $autores = mysql_fetch_array($result2)){

    do{
    	
    $nombre_completo = $nombre_completo . ", " . $autores['nombre'] . " " . $autores['paterno'] . " " . $autores['materno'];

    }while($autores = mysql_fetch_array($result2));
    
  }

  
printf("<li>");
printf("<div class=\"div_100c\">%s.</div>",$resumenes['numero']); 
printf("<div class=\"div_100b\">%s.</div>",$resumenes['id_resumen']);
printf("<div class=\"div_400\">.<a href=\"detalle_resumen.php?id_resumen=$resumenes[id_resumen]\">%s</a></div>",$resumenes['titulo']);
printf("<div class=\"div_250s\">%s.</div>",$nombre_completo);
printf("<div class=\"div_120\">.<a href=\"carta.php?id_resumen=$resumenes[id_resumen]\">Carta</a></div>");
printf("</li>");
  }while($resumenes = mysql_fetch_array($result));
printf("</ul>");
}



}  // end if busqeuda por sesion


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Busqeuda por nombre
/////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ($flag == "busqueda_por_nombre"){
//printf('hola');
//printf('%s',$busqueda);
$result = mysql_query("select asistentes_ugm.id_asistente, asistentes_ugm.nombre, asistentes_ugm.paterno, asistentes_ugm.materno, autores_ugm.id_resumen, resumen_ugm.titulo, resumen_ugm.numero from asistentes_ugm  
	                   inner join autores_ugm
	                   on asistentes_ugm.id_asistente = autores_ugm.id_asistente
	                   inner join resumen_ugm
	                   on autores_ugm.id_resumen = resumen_ugm.id_resumen
	                    where asistentes_ugm.paterno = '$busqueda' or 
	                    asistentes_ugm.materno = '$busqueda' or
	                    asistentes_ugm.nombre = '$busqueda' "
 
	                 ); 

//printf("%s",mysql_num_rows($result));
if ( $resumenes = mysql_fetch_array($result)){
 
 
do{

$result2 = mysql_query("select asistentes_ugm.id_asistente, asistentes_ugm.nombre, asistentes_ugm.paterno, asistentes_ugm.materno
	                   from resumen_ugm inner join autores_ugm on
	                   resumen_ugm.id_resumen = autores_ugm.id_resumen
	                   inner join asistentes_ugm on
	                   autores_ugm.id_asistente = asistentes_ugm.id_asistente
	                   where resumen_ugm.id_resumen = '$resumenes[id_resumen]'");

  if ( $autores = mysql_fetch_array($result2)){
     
    $nombre_completo = ''; 
    do{
     
    $nombre_completo = $nombre_completo . $autores['nombre'] . " " . $autores['paterno'] . " " . $autores['materno'] . ', ' ;
    
     
    }while($autores = mysql_fetch_array($result2));
     
    
  }
   

printf("<li>");
printf("<div class=\"div_100c\">%s.</div>",$resumenes['numero']); 
printf("<div class=\"div_100b\">%s.</div>",$resumenes['id_resumen']);
printf("<div class=\"div_400\">.<a href=\"detalle_resumen.php?id_resumen=$resumenes[id_resumen]\">%s</a></div>",$resumenes['titulo']);
printf("<div class=\"div_250\"><span class=\"small_font\">%s.</span></div>" ,$nombre_completo );
printf("<div class=\"div_120\">.<a href=\"carta.php?id_resumen=$resumenes[id_resumen]\">Carta</a></div>");
printf("</li>");
  }while($resumenes = mysql_fetch_array($result));
printf("</ul>");
}



}	// end if busqeuda por nombre



?>


</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
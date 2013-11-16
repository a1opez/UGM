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


  		  

<?php
header('Content-Type: text/html; charset=ISO-8859-1');
$id_resumen = $_GET['id_resumen'];


// headers
session_start();
require_once("funciones_ugm.php");
   connect_to_db();

$texto_autor = 'AUTOR';
$result = mysql_query("select * from resumen_ugm  where id_resumen =  '$id_resumen'" );
$resumen = mysql_fetch_array($result);


$result = mysql_query("select asistentes_ugm.nombre, asistentes_ugm.paterno,asistentes_ugm.materno , asistentes_ugm.correo, asistentes_ugm.institucion
                       from autores_ugm inner join asistentes_ugm on 
                       autores_ugm.id_asistente = asistentes_ugm.id_asistente 
                       where  autores_ugm.tipo_autor = '$texto_autor' and  autores_ugm.id_resumen = '$id_resumen'");

$autor = mysql_fetch_array($result);
//printf('%s',$autor['nombre']);
 

$nombre_completo = $autor['nombre'] . ' ' . $autor['paterno'] . ' ' . $autor['materno'];
 


$id_sesion = $resumen["id_sesion"];
//printf("hola, deseas aceptar tu resumen");
//mysql_query("update resumen_ugm set status = 'aceptado' where id_resumen =  '$id_resumen'" )

 

 

?>
<div class="div_878">
  		 cerrar ventana
  		</div>
  		<div  id="reportetitulo">
  		  RESUMEN
  		</div>

  		
  		<div class="resumen_etiqueta">
  		  Titulo:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s .",$resumen["titulo"]); ?>
  		</div>
<div class="resumen_etiqueta">
  		  Primer autor:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s .",$nombre_completo);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Correo electronico:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$autor["correo"]);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Institucion:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$autor["institucion"]);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Sesion:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$resumen["id_sesion"]);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Tipo de presentacion
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$resumen["tipo_resumen"]);?>
  		</div>
  		<div id="reporteresumen">
  		  Resumen
  		</div>  		
  		<div  id="resumenbody">
  		  <?php printf("%s.",$resumen["cuerpo"]);?>
  		</div>  

  		<div></div> 
 	 	 

</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
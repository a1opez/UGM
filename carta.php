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



// headers
session_start();
require_once("funciones_ugm.php");
connect_to_db();


// Post or Get Values
   $id_resumen = $_GET['id_resumen'];


$result = mysql_query("select autores_ugm.tipo_autor, asistentes_ugm.id_asistente, asistentes_ugm.nombre, asistentes_ugm.paterno, asistentes_ugm.materno, membresia_ugm.email, membresia_ugm.institucion, membresia_ugm.instituto    
	                   from resumen_ugm inner join autores_ugm on
	                   resumen_ugm.id_resumen = autores_ugm.id_resumen
	                   inner join asistentes_ugm on
	                   autores_ugm.id_asistente = asistentes_ugm.id_asistente
 	                   left join membresia_ugm on
	                   asistentes_ugm.id_membresia = membresia_ugm.id_membresia
	                   where resumen_ugm.id_resumen = '$id_resumen'");
 
 
  if ( $autores = mysql_fetch_array($result)){
    do{
    $nombre_completo = $nombre_completo . $autores['nombre'] . " " . $autores['paterno'] . " " . $autores['materno'] . ", ";
      if ( $autores['tipo_autor'] == 'AUTOR'){
        $email = $autores['email'];
        $institucion = $autores['institucion'];
        $instituto = $autores['instituto'];

      }
    }while($autores = mysql_fetch_array($result));
  }   


$result_resumen = mysql_query("select * from resumen_ugm where id_resumen = '$id_resumen'");
$resumen = mysql_fetch_array($result_resumen)
?>

<div class="div_878">
	<div class="date">
<?php //echo date('l jS \of F Y');

  setlocale(LC_ALL,"es_ES");
  $dia_semana = strftime("%A");
  $mes = strftime("%B");

  $dia_semana_esp = get_dia_semana_esp($dia_semana);
  //echo $dia_semana_esp;
  $mes_esp = get_month_esp($mes);
  //fecha =  strftime("%A %d de %B del %Y");
  echo  $dia_semana_esp . " " . strftime("%d") . " de " . $mes_esp . " del " . strftime("%Y") ;
  
 ?>
	</div>
 
</div>

<div class="div_878 carta">
<?php  echo $nombre_completo ?>
<?php echo $institucion . ", " . $instituto; ?>
<div class="div_878 carta">
<?php echo $email; ?>
</div>
</div>
<div class="div_878 carta">
Estimado Colega:
</div>

<div class="div_878 carta">
Su trabajo <?php echo $id_resumen ?>: "<?php echo $resumen['titulo']; ?>" ha sido aceptado para su presentacion en modalidad <?php echo $resumen['tipo_resumen']; ?> en la Reuni&oacute;n Anual 2013 de la Union Geofisica Mexicana, que se efectuara del 3 al 8 de noviembre en Puerto Vallarta, Jalisco, Mexico. El programa de la Reunion podra consultarlo en la pagina http://www.ugm.org.mx/raugm.

El comite organizador de la reunion agradece su interes por participar y esperamos verlo en Puerto Vallarta. 
</div>
</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
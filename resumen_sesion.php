<html>
<head>
	<title>

	</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
</head>
<?php

header('Content-Type: text/html; charset=ISO-8859-1');
$subio = 'subio';
$bajo = 'bajo';
$id_sesion = $_GET['id_sesion'];
$flag1 = $_GET['flag1'];
$id_resumen = $_GET['id_resumen'];
printf("%s",$nombre_sesion);
$flag = $_POST["flag"];
//printf("%s hola",$id_sesion);
printf("%s",$flag1);
$delete_flag = $_GET['delete_flag'];


// headers
session_start();
require_once("funciones_ugm.php");
   connect_to_db();


//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//    Seccion que borra el resumen
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
if ($delete_flag == 'delete'){


$resumen_borrado = $_GET['resumen_borrado'];

mysql_query("delete from resumen_ugm where id_resumen = '$resumen_borrado'");



}

//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//    seccion que procesa los resultados de la pagina donde se acepta o rechaza el resumen
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
if ($flag == 'actualizar_resumen'){

$id_resumen = $_POST['id_resumen'];
$comentario = $_POST['comentario'];
$tipo_resumen = $_POST['tipo_resumen'];
$duracion = $_POST['duracion'];
$id_sesion = $_POST['id_sesion'];
$numero = $_POST['numero'];


if ($_POST['action'] == 'Aceptar') {
    //printf("%s", 'Aceptaron');
    $status = "ACEPTADO";
} else if ($_POST['action'] == 'Rechazar') {
    //printf("%s", 'rechazaron');
    $status = "RECHAZADO";
} else if($_POST['action'] == 'Cancelar'){
    //printf("%s", 'cancelaron');
    $status = "CANCELADO";
}

$result = mysql_query("update resumen_ugm set comentario = '$comentario', status = '$status', tipo_resumen = '$tipo_resumen', duracion = '$duracion', id_sesion = '$id_sesion' , numero = '$numero' where id_resumen = '$id_resumen' ");
$result = mysql_query("select * from resumen_ugm where id_resumen = '$id_resumen'");
$resumenes_row = mysql_fetch_array($result);
//printf("%s", $id_resumen);
//printf("%s", $comentario);
//printf("%s", $resumenes_row['id_sesion']);
$id_sesion = $resumenes_row['id_sesion'];
}

//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //  
//Seccion dodne se procesa el cambio de orden de un resumen
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //  

if ($flag1 == 'subio' or $flag1 == 'bajo'){

$id_sesion = $_GET['id_sesion'];
$id_resumen = $_GET['id_resumen'];
//printf("%s", $flag1);
//printf("%s", $id_sesion);
//printf("Hola Mundo");
//printf("%s",$id_resumen);


$result = mysql_query("select * from resumen_ugm where id_resumen = '$id_resumen'");
$resumenes_row = mysql_fetch_array($result);
$numero = $resumenes_row['numero'];
if ($flag1 == 'subio'){
$numero2 = $numero - 1;
}
else{
$numero2 = $numero + 1;

}


printf("%s",$numero);
printf("%s",$numero2);
$techo = 9999;
$result = mysql_query("update resumen_ugm set numero = '$techo' where id_resumen = '$id_resumen' ");
$result = mysql_query("update resumen_ugm set numero = '$numero' where numero = '$numero2' and  id_sesion = '$id_sesion'");
$result = mysql_query("update resumen_ugm set numero = '$numero2' where numero = '$techo' and  id_sesion = '$id_sesion'");
   
}

//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//    Obtener los datos de la cabezaera
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 

$result = mysql_query("select  nombre from sesiones_ugm where id_sesion = '$id_sesion'");
$sesion = mysql_fetch_array($result);
$result = mysql_query("select  count(*) as numero from resumen_ugm where id_sesion = '$id_sesion'");
$numero_resumenes = mysql_fetch_array($result);

?>
<body> 
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">
<div class="page_title2">
<p><?php printf("%s : %s",$id_sesion, $sesion['nombre']); ?></p>
<p><?php printf("%s Res&uacute;menes",$numero_resumenes['numero']); ?></p>
</div>        
 
<?php
 


//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//    cuando navegacion proviene de login
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
if ($flag == 'from_login'){

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysql_query("select id_sesion from moderadores_ugm where username = '$username'  and password = '$password' ");
$moderador = mysql_fetch_array($result);
$id_sesion = $moderador['id_sesion'];
}

 


 
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //  
//Seccion dodne se presentan los datos
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //  

$result = mysql_query("select * from resumen_ugm where id_sesion = '$id_sesion' and status = 'PRESENTADO' order by numero");
$num_rows = mysql_num_rows($result);
$carteles = mysql_query("select count(*) as num_cartel from resumen_ugm where id_sesion = '$id_sesion' and status = 'PRESENTADO' and tipo_resumen='CARTEL'");
$num_cartel = mysql_fetch_array($carteles);
$orales = mysql_query("select count(*) as num_oral from resumen_ugm where id_sesion = '$id_sesion' and status = 'PRESENTADO' and tipo_resumen='ORAL'");
$num_oral = mysql_fetch_array($orales);

 


printf("<div class=\"subseccion\"><h1>PENDIENTES</h1> </div>"); 
if ($_SESSION['rol'] == 'admon'){

printf("<div><a href=\"mostrar_resumenes.php\"><buton>REGRESAR</buton></a></div>");

}elseif($_SESSION['rol'] == 'moderador'){

printf("<div><a href=\"menu_ugm.php\"><buton>REGRESAR</buton></a></div>");

}else{

printf(".");

} 
printf("<div class=\"div_500\">Total de resumenes: %s ( Oral %s, Cartel %s)</div>",$num_rows, $num_oral["num_oral"],$num_cartel["num_cartel"]);

?>

    
<div class="column_headers">  
<div class="div_60"><p>Clave</p></div>  
<div class="div_60 font_12"><p>#resumen</p></div> 
<div class="div_500"><p>Titulo</p></div>
<div class="div_140"><p>Autor</p></div>
<div class="div_60"><p>Tipo</p></div>
<div class="div_60"><p>Durac.</p></div>
<div class="div_60"><p>Subir</p></div>
<div class="div_60"><p>Bajar</p></div>
</div>
<br>
<?php

 
if ( $resumenes_row = mysql_fetch_array($result)){
printf("<ul>");	
do{

//nombre del primer autor
 
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_asistente = mysql_query("select id_asistente from autores_ugm where id_resumen = '$resumenes_row[id_resumen]'");
$id_asistente = mysql_fetch_array($query_asistente);
$query_nombre = mysql_query("select nombre,paterno,materno from asistentes_ugm where id_asistente = '$id_asistente[id_asistente]'");
$nombres_autor = mysql_fetch_array($query_nombre);
$nombre_autor  = $nombres_autor['nombre'] . ' ' . $nombres_autor['paterno'] . ' ' . $nombres_autor['materno'];
 
printf("<li>");

// Si la ppresentacion es oral se pinta el fondod e un color
if ($resumenes_row["tipo_resumen"] == 'ORAL'){
printf("<div class=\"div_60 font_12\">%s-%s</div><div class=\"div_60\">%s</div><div class=\"div_500  blue\"><a href=\"aceptar_resumen.php?id_resumen=$resumenes_row[id_resumen] \"> %s. </a></div> 
   <div class=\"div_140 smaller_font\">%s.</div><div class=\"div_60 font_12\">%s</div><div class=\"div_60\">%s.</div><div class=\"div_60\">.</div><div class=\"div_60\">.</div>",$id_sesion,$resumenes_row["numero"],$resumenes_row["id_resumen"],$resumenes_row["titulo"],
  $nombre_autor,$resumenes_row["tipo_resumen"], $resumenes_row["duracion"]);

}
//Si es Cartel se pinta de otro color
elseif($resumenes_row["tipo_resumen"] == 'CARTEL' ){

printf("<div class=\"div_60 font_12\">%s-%s</div><div class=\"div_60\">%s</div><div class=\"div_500 yellow\"><a href=\"aceptar_resumen.php?id_resumen=$resumenes_row[id_resumen] \"> %s. </a> </div>
   <div class=\"div_140 smaller_font\">%s.</div><div class=\"div_60 font_12\">%s.</div><div class=\"div_60  \">%s.</div><div class=\"div_60\">.</div><div class=\"div_60\">.</div>",$id_sesion,$resumenes_row["numero"],$resumenes_row["id_resumen"],$resumenes_row["titulo"],
  $nombre_autor,$resumenes_row["tipo_resumen"], $resumenes_row["duracion"]);
 

}
else{

printf("<div class=\"div_60 font_12\">%s-%s</div><div class=\"div_60\">%s</div><div class=\"div_560 \"><a href=\"resumen_sesion.php?nombre_sesion=$resumenes_row[titulo] \"> %s. </a></div><div class=\"div_100  \">%s</div>
   <div class=\"div_100\">%s</div><div class=\"div_60 \">%s</div><div class=\"div_60\">%s.</div><div class=\"div_60\">%s</div>",$id_sesion,$resumenes_row["numero"],$resumenes_row["id_resumen"],$resumenes_row["titulo"],
  $nombre_autor,$resumenes_row["tipo_resumen"],$resumenes_row["duracion"], 'H','L');


}
printf("</li>");



}while($resumenes_row = mysql_fetch_array($result));
printf("</ul>");
}



?>

<?php

$result = mysql_query("select * from resumen_ugm where id_sesion = '$id_sesion' and status = 'ACEPTADO' order by numero");
$num_rows = mysql_num_rows($result);
$carteles = mysql_query("select count(*) as num_cartel from resumen_ugm where id_sesion = '$id_sesion' and status = 'ACEPTADO' and tipo_resumen='CARTEL'");
$num_cartel = mysql_fetch_array($carteles);
$orales = mysql_query("select count(*) as num_oral from resumen_ugm where id_sesion = '$id_sesion' and status = 'ACEPTADO' and tipo_resumen='ORAL'");
$num_oral = mysql_fetch_array($orales);
printf("<div class=\"subseccion\"><h1>ACEPTADOS</h1></div>");
//<div class=\"back\"><a href=\"menu_ugm.php\"><h1>REGRESAR<h1></a></div></div>");
printf("<div class=\"div_500\">Total de resumenes: %s ( Oral %s, Cartel %s)</div>",$num_rows, $num_oral["num_oral"],$num_cartel["num_cartel"]);
?>
         
<div class="column_headers">
  <div class="div_60"><p>Clave</p></div>  
<div class="div_60 font_12"><p>#resumen</p></div>
<div class="div_500"><p>Titulo</p></div>
<div class="div_140"><p>Autor</p></div>
<div class="div_60"><p>Tipo</p></div>
<div class="div_60"><p>Durac.</p></div>
<div class="div_60"><p>Subir</p></div>
<div class="div_60"><p>Bajar</p></div>
</div>
<br>

<?php

 
if ( $resumenes_row = mysql_fetch_array($result)){
printf("<ul>"); 
do{

//obtener nombre de autor
$query_asistente = mysql_query("select id_asistente from autores_ugm where id_resumen = '$resumenes_row[id_resumen]'");
$id_asistente = mysql_fetch_array($query_asistente);
$query_nombre = mysql_query("select nombre,paterno,materno from asistentes_ugm where id_asistente = '$id_asistente[id_asistente]'");
$nombres_autor = mysql_fetch_array($query_nombre);
$nombre_autor  = $nombres_autor['nombre'] . ' ' . $nombres_autor['paterno'] . ' ' . $nombres_autor['materno'];


printf("<li>");
if ($resumenes_row["tipo_resumen"] == 'ORAL'){
printf("<div class=\"div_60 font_13\">%s-%s</div><div class=\"div_60\">%s</div><div class=\"div_500  blue\"><a href=\"aceptar_resumen.php?id_resumen=$resumenes_row[id_resumen] \"> %s. </a></div> 
   <div class=\"div_140 smaller_font\">%s.</div><div class=\"div_60 font_12\">%s.</div><div class=\"div_60\">%s.</div>
   <div class=\"div_60\">.<a href=\"resumen_sesion.php?id_sesion=$resumenes_row[id_sesion]&flag1=$subio&id_resumen=$resumenes_row[id_resumen]\"><img src=\"img/up.png\"/></a></div>
   <div class=\"div_60\">.<a href=\"resumen_sesion.php?id_sesion=$resumenes_row[id_sesion]&flag1=$bajo&id_resumen=$resumenes_row[id_resumen]\"><img src=\"img/down.png\"/></a></div>",
   $id_sesion,$resumenes_row["numero"],$resumenes_row["id_resumen"],$resumenes_row["titulo"],
  $nombre_autor,$resumenes_row["tipo_resumen"], $resumenes_row["duracion"]);
}
elseif($resumenes_row["tipo_resumen"] == 'CARTEL' ){
printf("<div class=\"div_60 font_13\">%s-%s</div><div class=\"div_60\">%s</div><div class=\"div_500  yellow\"><a href=\"aceptar_resumen.php?id_resumen=$resumenes_row[id_resumen] \"> %s. </a></div> 
  <div class=\"div_140 smaller_font\">%s.</div><div class=\"div_60 font_12\">%s.</div><div class=\"div_60\">%s.</div>
  <div class=\"div_60\">.<a href=\"resumen_sesion.php?id_sesion=$resumenes_row[id_sesion]&flag1=$subio&id_resumen=$resumenes_row[id_resumen]\"><img src=\"img/up.png\"/></a></div>
  <div class=\"div_60\">.<a href=\"resumen_sesion.php?id_sesion=$resumenes_row[id_sesion]&flag1=$bajo&id_resumen=$resumenes_row[id_resumen]\"><img src=\"img/down.png\"/></a></div>",$id_sesion,$resumenes_row["numero"],$resumenes_row["id_resumen"],$resumenes_row["titulo"],
  $nombre_autor,$resumenes_row["tipo_resumen"], $resumenes_row["duracion"]);

}  
else{

}

 


printf("</li>");
  }while($resumenes_row = mysql_fetch_array($result));
printf("</ul>");
}
?>

<?php

$result = mysql_query("select * from resumen_ugm where id_sesion = '$id_sesion' and status = 'CANCELADO' order by numero");
$num_rows = mysql_num_rows($result);
$carteles = mysql_query("select count(*) as num_cartel from resumen_ugm where id_sesion = '$id_sesion' and status = 'CANCELADO' and tipo_resumen='CARTEL'");
$num_cartel = mysql_fetch_array($carteles);
$orales = mysql_query("select count(*) as num_oral from resumen_ugm where id_sesion = '$id_sesion' and status = 'CANCELADO' and tipo_resumen='ORAL'");
$num_oral = mysql_fetch_array($orales);
printf("<div class=\"subseccion\"><h1>RECHAZADOS</h1></div> ");
printf("<div class=\"div_500\">Total de resumenes: %s ( Oral %s, Cartel %s)</div>",$num_rows, $num_oral["num_oral"],$num_cartel["num_cartel"]);
?>
        
<div class="column_headers">
<div class="div_60"><p>Clave</p></div>  
<div class="div_60 font_12"><p>#resumen</p></div>  
<div class="div_500"><p>Titulo</p></div>
<div class="div_100"><p>Autor</p></div>
<div class="div_100"><p>Tipo</p></div>
<div class="div_60"><p>Durac.</p></div>
<div class="div_60"><p>Subir</p></div>
<div class="div_60"><p>Bajar</p></div>
</div>
<br>

<?php

 


if ( $resumenes_row = mysql_fetch_array($result)){
printf("<ul>"); 
do{
printf("<li>");
printf("<div class=\"div_60 font_12\">%s-%s</div><div class=\"div_60\">%s</div><div class=\"div_500  blue\"><a href=\"aceptar_resumen.php?id_resumen=$resumenes_row[id_resumen] \"> %s. </a></div> 
   <div class=\"div_140 smaller_font\">%s.</div><div class=\"div_60 font_12\">%s.</div><div class=\"div_60\">%s.</div><div class=\"div_60\">.</div><div class=\"div_60\">.</div>",$id_sesion,$resumenes_row["numero"],$resumenes_row["id_resumen"],$resumenes_row["titulo"],
  $nombre_autor,$resumenes_row["tipo_resumen"], $resumenes_row["duracion"] );
printf("</li>");
  }while($resumenes_row = mysql_fetch_array($result));
printf("</ul>");
}
?>


</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
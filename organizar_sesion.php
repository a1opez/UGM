<html>
<head>
	<title>

	</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
</head>

<body> 
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">	
        <div class="page_title2">Organizar sesiones</div>
        <div class="div_878">
        <div id="agregar_sesion"><a href="capturar_sesion.php">Agregar sesion nueva</a></div>
        <div id="back_organizar_sesion"><a href="menu_ugm.php"><button class="boton_regresar">REGRESAR</button></a></div>
        </div>

<?php
 


// headers
header('Content-Type: text/html; charset=ISO-8859-1');
require_once("funciones_ugm.php");
connect_to_db();

//posts

$flag = $_POST['flag'];
$flag2 = $_GET['flag2'];
//printf("holis %s",$flag2);

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// Seccion que guarda una sesion nueva
/////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($flag == 'crear_sesion'){
$id_sesion = $_POST['id_sesion'];
$id_seccion = $_POST['id_seccion'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$moderador = $_POST['moderador'];
$tipo = $_POST['tipo'];
$email_moderador = $_POST['email_moderador'];


$result = mysql_query("insert  into sesiones_ugm (id_sesion, id_seccion, clave, nombre, moderador, tipo) values ('$id_sesion', '$id_seccion', '$clave', '$nombre', '$moderador', '$tipo')" );
$result = mysql_query("insert  into moderadores_ugm (nombre, email, id_sesion) values ( '$moderador', '$email_moderador','$id_sesion')" );

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// Seccion que modifica una sesion
/////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag == 'modificar_sesion'){

$id_sesion = $_POST['id_sesion'];
$id_seccion = $_POST['id_seccion'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$moderador = $_POST['moderador'];
$tipo = $_POST['tipo'];

$result = mysql_query("update sesiones_ugm set id_sesion = '$id_sesion', id_seccion = '$id_seccion', clave = '$clave', nombre = '$nombre',  moderador = '$moderador', tipo = '$tipo' where id_sesion = '$id_sesion' " );

//printf("Hola muindo %s",$id_seccion);

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// Seccion que borra una sesion
/////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag2 == 'borrar_sesion'){
$id_sesion = $_GET['id_sesion'];
$result = mysql_query("delete from sesiones_ugm where id_sesion = '$id_sesion' ");

//printf("hols %s",$flag2);
//printf("hols %s",$id_sesion);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// Seccion que despliega todas las sesiones
///////////////////////////////////////////////////////////////////////////////////////////////////////// 
$result = mysql_query("select * from sesiones_ugm");


if ( $sesiones = mysql_fetch_array($result)){
printf("<ul>"); 
printf("<li>");
printf("<div id=\"lista_sesiones\"><p>Lista de Sesiones:</p>");
printf("</li>");
do{
printf("<li>");
printf("<div class=\"div_800\" ><a id=\"item_sesion\" href=\"modificar_sesion.php?id_sesion=$sesiones[id_sesion]\">%s</a></div>",$sesiones['nombre']); 
printf("</li>");
  }while($sesiones = mysql_fetch_array($result));
printf("</ul>");
} 
 
?>


</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>

<script type="text/javascript">




</script>
</body>

</html>
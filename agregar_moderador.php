<html>
<head>
	<title>

	</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
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
//session_start();
//require_once("funciones_ugm.php");

 


$id_sesion = $_GET['id_sesion'];
//$moderador = $_GET['moderador'];
//print $moderador." = si";
 
//$id_sesion = $_POST('email');
print $id_sesion;


//print "f";
//print ("%s",$moderador);
//printf("hola");
//$result = mysql_query("insert  into moderadores_ugm (id_sesion, nombre, email) values ('$id_sesion', '$moderador', '$email')" );
//printf("%s"$id_sesion);
 //  $moderador = "perro";
//printf( "%s",$moderador);



?> 
<div class="page_title2">
 INGRESA LOS DATOS DEL NUEVO MODERADOR
</div>

<div id="forma_ingresar_moderador">
<form name="form" method="post" action="modificar_sesion.php" accept-charset="ISO-8859-1">

 
 
	<p class="input_field">
<label for="moderador">Nombre:</label> 
<input type="text" name="moderador" id="moderador"> 
 
</p>

<p class="input_field">
 
<label for="email">Email:</label> 
<input type="text" name="email" id="email"> 
</p>
<input type="hidden" name="flag" id="flag" value="agregar_moderador">
<input type="hidden" name="id_sesion" id="id_sesion" value="<?php printf("%s",$id_sesion);    ?>">
<p>

<input type="submit" value="Ingresar Moderador" id="submit">
</p>
</form>
</div>


 
 

 

 
 

</div>

<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


 

</div>



</div> 

</body>

</html> 
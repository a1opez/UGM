<html>
<head>
	<title>

	</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
</head>

<body> 
	  <div id="wrapper">
     	<div id="header">  
  	         <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>	
  		</div>
  		
  		<div id="main">	

<div class="manu_ugm">

<ul>

<li><a href="login.php">Registrar resumen</a> </li>
<li><a href="login_editar_resumen.php">Modificar Resumen</a> </li>
<li><a href="ver_sesiones.php">Ver resumenes</a> </li>
<li><a href="login_organizar_resumenes.php">Organizar resumenes</a> </li>
<li><a href="login_organizar_sesion.php">Organizar Sesiones</a> </li>
</ul>


</div>
<?php




// headers
session_start();
require_once("funciones_ugm.php");
 




?>


</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>

</div>

</div>


</body>

</html>
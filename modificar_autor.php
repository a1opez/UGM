<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
require_once("funciones_ugm.php");
   connect_to_db();
?>


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
  		
  		  <?php
  		  
  		  $id_asistente = $_GET['id_asistente'];
        $id_membresia = $_GET['id_membresia'];
        $id_resumen = $_GET['id_resumen'];
  		  
 
  		  $result = mysql_query("select * from asistentes_ugm where id_asistente = '$id_asistente' ");
  		  $row = mysql_fetch_array($result);
  		   
  		    
  		  ?>
  		
  		
  		<div id="main">
  		
  		  <form name="form" method="post" action="resumen_reporte.php" accept-charset="ISO-8859-1">
  		  
  		  <input type="hidden" name="flag" id = "flag" value="modificar_autor" >
  		  <input type="hidden" name="mod_id_asistente" id = "mod_id_asistente" <?php printf(" value=\"%s \"",$row["id_asistente"]); ?> >
        <input type="hidden" name="id_resumen" id = "id_resumen" <?php printf(" value=\"%s \"",$id_resumen); ?> >
        <input type="hidden" name="id_membresia" id = "id_membresia" <?php printf(" value=\"%s \"",$id_membresia); ?> >
 
  		  <div class="forma_autor">
  		  <label class="label_top" for="nombre">Nombre</label>
  		  <input  type="text" name="nombre" id="nombre"  <?php printf(" value=\"%s \"",$row["nombre"]); ?> >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="paterno">Paterno</label> 
  		  <input  type="text" name="paterno" id="paterno" <?php printf(" value=\"%s \"",$row["paterno"]); ?> >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="materno">Materno</label> 
  		  <input  type="text" name="materno" id="materno" <?php printf(" value=\"%s \"",$row["materno"]); ?> >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="correo">Correo</label> 
  		  <input  type="text" name="correo" id="correo" <?php printf(" value=\"%s \"",$row["correo"]); ?> >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="id_institucion">Institucion</label> 
  		  <input  type="text" name="institucion" id="institucion" <?php printf(" value=\"%s \"",$row["institucion"]); ?>>
  		  </div>
  		   
          <input  type="submit" name="submit" id="submit" value="Continuar" class="submit"> 	
  		  </form>	  		 
  		
  		
  		
  		
  		
  		
  		
  		
  		</div>
  		        
        <div id="footer">
          <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>
        </div>        

     </div>  		
  		 
</body>


</html>  

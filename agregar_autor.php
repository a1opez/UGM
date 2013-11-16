<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
require_once("funciones_ugm.php");
connect_to_db();

   $id_membresia = $_GET['id_membresia'];
   $id_resumen = $_GET['id_resumen'];

 
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
  		
  		<div id="main">
  		
  		  <form name="form" method="post" action="resumen_reporte.php" accept-charset="ISO-8859-1">
  		  
  		  <input type="hidden" name="flag" id = "flag" value="agregar_autor" >
        <input type="hidden" name="id_membresia" id = "id_membresia" value="<?php printf("%s",$id_membresia);?>" >
        <input type="hidden" name="id_resumen" id = "id_resumen" value="<?php printf("%s",$id_resumen);?>" >

  		  <div class="forma_autor">
  		  <label class="label_top" for="nombre">Nombre</label>
  		  <input  type="text" name="nombre" id="nombre"  >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="paterno">Paterno</label> 
  		  <input  type="text" name="paterno" id="paterno"  >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="materno">Materno</label> 
  		  <input  type="text" name="materno" id="materno"  >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="correo">Correo</label> 
  		  <input  type="text" name="correo" id="correo"  >
  		  </div>
  		  
  		  <div class="forma_autor">
  		  <label class="label_top" for="institucion">Institucion</label> 
  		  <input  type="text" name="institucion" id="institucion">
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

<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
require_once("funciones_ugm.php");
?>


<html>
<head>
	<title>

	</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
  
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 
  <script type="text/javascript" src="js/jquery.validate.js"></script>

<script type="text/javascript">
$(function(){

    $("#form_resumen").validate({
        rules: {

            titulo: {
                required: true
            },
            cuerpo: {
                required: true
            }        
        },

        messages: {

            titulo: {
                required: "No olvides escribir el titulo del resumen"
            },
             cuerpo: {
                required: "No olvides escribir el cuerpo"
            }

        }    
    });

});

</script>
</head>


<body>
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		  	   
  		<?php 
  		  //$id_membresia = 1845;
        $id_membresia = $_POST['id_membresia']; 
  		  $_SESSION['global_membresia'] = $id_membresia;
  		 ?>	   
  	    <div id="main">

 
  	      		<form name="form_resumen" id="form_resumen" method="post" action="resumen_reporte.php" accept-charset="ISO-8859-1">
  	      		
  	      		<!-- hidden fields -->
  	      		  <input type="hidden" name="flag" id = "flag" value="insertar_resumen" >
  	      		  <?php printf("<input type=\"hidden\" name=\"id_membresia\" id=\"id_membresia\" value=\"%s\">",$id_membresia);?>
  	      		
  	      		<div class="forma_resumen gray">
  	      		  RESUMEN
  	      		</div>
  	      		<div class="forma_resumen"> 
  		        <label for="titulo">Titulo</label>
  			    <input  type="text" name="titulo" id="titulo"  class="field_titulo">
  			    </div>
  			    
  			    <div class="forma_resumen">
  			      <div class="div_878">Primer Autor:</div>
  			      
  			     <?php extrae_datos_autor($id_membresia);?>-
  			      
  			        			        			      
  			    </div>
  			    
  			    <div class="forma_resumen">
            <div class="div_878">  
  			     Resumen:  si debe exceder de 500 palabras
          Puede teclearlo directamente. Puede transladarlo (copiar-pegar) desde el procesador de texto de su preferencia.
          NOTA: No use la tecla ENTER para cambiar de renglon, solo despues de punto y aparte.
          </div>      
                <textarea name="cuerpo" id="cuerpo"></textarea>
  			    </div>
 
 
                <div class="forma_resumen">
                  <div class="div_878">
                    Ubique su trabajo en una de las siguientes sesiones:
                  </div>
                Sesion Especial: 
                <br>
                 
                    <?php extrae_sesiones(); ?>
                   
                  
                </div>
                <div class="forma_resumen">
                  Tipo de presentacion:   
  			      <label  for="oral">Oral</label>
  			      <input  type="radio" name="tipo_resumen" id="oral" value="ORAL" checked="checked">      
  			      <label  for="cartel">Cartel</label>
  			      <input  type="radio" name="tipo_resumen" id="cartel" value="CARTEL">       			                   
                </div> 
                <div class="forma_resumen center">
                  La desicion final la tomara el comite organizador
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

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

    $("#form").validate({
        rules: {

            email: {
                required: true,
 
                
            }

 
        },

        messages: {

            email: {
                required: "No olvides escribir tu numero de membresia"
 
 
            }
 

        }    
    });

});

 
</script>
</head>


<?php




// headers
session_start();
require_once("funciones_ugm.php");


 




?>
<body> 
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">	
  			<div class="page_title2">
              OBTENER CLAVE DE RESUMEN

            </div>
            <div> </div>
            <div class="input_email">
            <form name="form" method="post" action="mandar_clave.php">
            	<label for="email">escribe tu cuenta de correo</label>
    	         <input type="text" name="email" id="email">
    	          <input type="submit" value="Obtener Clave">
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
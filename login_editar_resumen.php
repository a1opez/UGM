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

    $("#forma_registrar_resumen").validate({
        rules: {

            clave: {
                required: true,
                remote: {url: 'validar_login_editar_resumen.php', async:false}
            }

 
        },

        messages: {

            clave: {
                required: "No olivdes escribir la clave del resumen",
      			    remote: "esa clave de resumen no existe"   
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
   		
   		<div id="main">	
 <div class="page_title2" >
  Ingresa la clave de resumen para editarlo
 </div>
 <form method="post" action="resumen_reporte.php" id="forma_registrar_resumen" accept-charset="ISO-8859-1">
 <label for="clave" class="formlabel">Clave de Resumen:</label>	
 <input type="text" name="clave" class="forminput">
 <input type="hidden" name="flag" value="ver_resumen">

<!-- 
 <label for="password" class="formlabel">Password:</label>
 <input type="password" name="password" class="forminput">
-->
 <p>
 <input type="submit" name="login" value="Login" id="submit">
</p>
 </form>
 <?php
 
 
 
 
 
 

 
 
 
 
 ?>
 

 <p><div class="link_to_get_mail"><a href="obtener_clave.php">Si olvidaste la clave de tu resumen hacer click aqui</a></div></p>
 
 </div>
 
 
 
 <div id="footer">
 <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>
 
 
 </div>
 
 </div>
 
 
 </body>
 
 </h
 <html>
 <head>
 	<title>
 
 	</title>
 <meta charset="ISO-8859-1" />	
 <link rel="stylesheet" type="text/css" href="css/style.css" />	
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script type="text/javascript" src="js/jquery.validate.js"></script>

 <script type="text/javascript">
$(function(){

    $("#forma_registrar_resumen").validate({
        rules: {

            id_membresia: {
                required: true,
                number: true,
                remote: {url: 'validar_login.php', async:false}
            }

        },

        messages: {

            id_membresia: {
                required: "No olvides escribir tu numero de membresia",
                number: "Solo usar numeros para tu membresia",
      			remote: "ese numerod e memrbesia no existe"   
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
  Ingresa tus datos de membresia para registrar resumen
 </div>
 <form method="post" action="resumen_datos.php" id="forma_registrar_resumen" name="forma_registrar_resumen" accept-charset="ISO-8859-1">
 <label for="username" class="formlabel">ID Membresia:</label>	
 <input type="text" name="id_membresia" class="forminput">
 <!--
 <label for="username" class="formlabel">Password:</label>
 <input type="password" name="password" class="forminput">
-->
 <p>
 <br/>	
 <br/>
 <input type="submit" name="login" value="Login" id="submit">
</p>
 </form>
 <?php
 
 
 
 
 
 

 
 
 
 
 ?>
 
 
 </div>
 
 
 
 <div id="footer">
 <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>
 
 
 </div>
 
 </div>
 
 
 </body>
 
 </h
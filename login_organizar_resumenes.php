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

            username: {
                required: true,
 
                
            },

            password: {
                required: true,
  
            }
        },

        messages: {

            username: {
                required: "No olvides escribir tu numero de membresia",
                number: "Solo usar numeros para tu membresia",
      			remote: "ese numerod e memrbesia no existe"   
            },
            password: {
                required: "No olvides escribir tu numero de membresia",
                number: "Solo usar numeros para tu membresia",
      			remote: "ese numerod e memrbesia no existe"   
            }

        }    
    });

});

function submitForm(){
//$("#forma_registrar_resumen").on('submit',function(event){  
//    console.log('si');   
 
//   $.post('validate_user.php', $(this).serialize(),function(data){  alert(data); var dat = data;   });  

//   event.preventDefault();
  // $.post(dat, $(this).serialize());
    
//});
//$.post('validate_user.php', $(this).serialize(),function(data){ console.log(data); }); 
//$("#forma_registrar_resumen").attr("action", data );
 
 
}
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
  Ingresa tus datos para organizar resumen
 </div>
 <form method="post" action="validar_moderador.php" id="forma_registrar_resumen" name="forma_registrar_resumen" accept-charset="ISO-8859-1">
 	<input type="hidden" name="flag" value="from_login">
    <input type="hidden" name="dec" >
    <input type="hidden" name="flag" value="moderar_resumen">
 <label for="username" class="formlabel">Usuario:</label>	
 <input type="text" name="username" class="forminput">
 
 <label for="password" class="formlabel">Password:</label>
 <input type="password" name="password" class="forminput">

 <p>
 <input type="submit" name="login" value="Login" id="submit" onclick="submitForm()">
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
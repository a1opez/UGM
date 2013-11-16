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
      <div class="page_title2">
      INGRESAR DATOS PARA AGREGAR SESION
      </div>
 
      <div class="form_container">
      <form name="form" method="post" action="organizar_sesion.php" accept-charset="ISO-8859-1">
 
      <p>  
      <label for="id_sesion" >ID Sesion</label>  
      <input type="text" name="id_sesion">
      </p>
      <p>  
      <label for="nombre" >Nombre</label>
      <input type="text" name="nombre">
      </p>      
      <p>  
<label for="id_seccion">Secciones</label> 
 
 <select name="id_seccion" id="id_seccion">
  <option value="TIERRA_SOLIDA">Tierra Solida</option>
  <option value="OCEANOGRAFIA">Oceanografia</option>
  <option value="ATMOSFERA">Atmosfera</option>
  <option value="ESPACIO_EXTERIOR">Espacio Exterior</option>
</select>
      </p>
      <!--
      <p>
      <label for="clave" >Clave</label>
      <input type="text" name="clave">
      </p>
    -->
 
      <!--
      <p>  
      <label for="moderador" >Moderador</label>
      <input type="text" name="moderador">
      </p>
      <p>  
      <label for="email_moderador" >Email Mod</label>
      <input type="text" name="email_moderador">
      </p>
      -->
<div class="radio">
<p>
              <div class="div_radio"> 
              <label  for="especial">Especial</label>            
              <input  type="radio" name="tipo" id="especial" value="especial">       
              </div>
              <div class="div_radio">
               <label  for="regular">Regular</label>
               <input  type="radio" name="tipo" id="regular" value="regular" checked> 
               </div>
</p>  
</div>     

<input type="hidden" name="flag" value="crear_sesion">       
<input type="submit" name="action" value="Agregar Sesion" id="submit">

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
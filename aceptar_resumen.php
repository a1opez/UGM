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


  		  

<?php
header('Content-Type: text/html; charset=ISO-8859-1');



$id_resumen = $_GET['id_resumen'];


// headers
session_start();
require_once("funciones_ugm.php");
connect_to_db();


$result = mysql_query("select * from resumen_ugm  where id_resumen =  '$id_resumen'" );
$resumen = mysql_fetch_array($result);

//nombre del primer autor

$query_nombres = mysql_query("select  asistentes_ugm.nombre , asistentes_ugm.paterno, asistentes_ugm.materno, asistentes_ugm.correo, asistentes_ugm.institucion
                              from asistentes_ugm 
                              inner join autores_ugm on
                                asistentes_ugm.id_asistente = autores_ugm.id_asistente 
                              where autores_ugm.id_resumen = '$id_resumen'");
$datos_autor = mysql_fetch_array($query_nombres);
$nombre_autor  = $datos_autor['nombre'] . ' ' . $datos_autor['paterno'] . ' ' . $datos_autor['materno'];
 
 


$id_sesion = $resumen["id_sesion"];
//printf("hola, deseas aceptar tu resumen");
//mysql_query("update resumen_ugm set status = 'aceptado' where id_resumen =  '$id_resumen'" )

 

 

?>
<div class="div_878">
  		 
  		</div>
  		<div  id="reportetitulo">
  		  <div>RESUEMN</div><div id="borrar"><a href="resumen_sesion.php?delete_flag=delete&id_sesion=<?php printf("%s",$id_sesion);?>&resumen_borrado=<?php printf("%s",$id_resumen);?>"><button id="boton_borrar">Borrar</button></a></div>
  		</div>

  		
  		<div class="resumen_etiqueta">
  		  Titulo:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s .",$resumen["titulo"]); ?>
  		</div>
<div class="resumen_etiqueta">
  		  Primer autor:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s .",$nombre_autor);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Correo electronico:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$datos_autor['correo']);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Institucion:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$datos_autor['institucion']);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Sesion:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$resumen["id_sesion"]);?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Tipo de presentacion
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("%s.",$resumen["tipo_resumen"]);?>
  		</div>
  		<div id="reporteresumen">
  		  Resumen
  		</div>  		
  		<div  id="resumenbody">
  		  <?php printf("%s.",$resumen["cuerpo"]);?>
  		</div>  

  		<div></div> 
  		 <form id="forma_aceptar_resumen" name="form" method="post" action="resumen_sesion.php" accept-charset="ISO-8859-1">  

                <div class="forma_resumen">
                  <div class="div_878">
                  </div>
                Sesion Especial: 
                <br>
                 
                   <?php extrae_sesiones_mod($id_resumen); ?>
                   
                  
                </div>


<p>
Tipo Resumen:
</p>
<div id="tipo_resumen">
<?php
                  if ($resumen["tipo_resumen"] == 'CARTEL'){   
                  
  			      printf("<label  for=\"oral\">Oral</label>");  			      
  			      printf("<input  type=\"radio\" name=\"tipo_resumen\" id=\"oral\" value=\"ORAL\">");      
  			      printf("<label  for=\"cartel\">Cartel</label>");
  			      printf("<input  type=\"radio\" name=\"tipo_resumen\" id=\"cartel\" value=\"CARTEL\" checked>");   
  			      }
  			      else{
                  
  			      printf("<label  for=\"oral\">Oral</label>");  			      
  			      printf("<input  type=\"radio\" name=\"tipo_resumen\" id=\"oral\" value=\"ORAL\" checked>");      
  			      printf("<label  for=\"cartel\">Cartel</label>");
  			      printf("<input  type=\"radio\" name=\"tipo_resumen\" id=\"cartel\" value=\"CARTEL\">");  			      
  			      
  			      
  			      
  			      
  			      }



?>  		 	
</div>
           <p>
           <label for="duracion">Duracion:</label>	
           <select name="duracion">
           <option selected="selected">15</option>
		<option>5</option>
		<option>10</option>
		<option>15</option>
		<option>20</option>
		<option>25</option>
		<option>30</option>
		<option>35</option>
		<option>40</option>
		<option>45</option>
		<option>50</option>
		<option>55</option>
		<option>60</option>
		<option>65</option>
		<option>70</option>
		<option>75</option>
		<option>80</option>		
		<option>85</option>
		<option>90</option>
		<option>95</option>
		<option>100</option>
		<option>105</option>
		<option>110</option>
		<option>115</option>
		<option>120</option>
		<option>125</option>
		<option>130</option>
		<option>135</option>
		<option>140</option>
		<option>145</option>
		<option>150</option>
		<option>155</option>
		<option>160</option>
		<option>165</option>
		<option>170</option>
		<option>175</option>
		<option>180</option>			
           </select>


           </p>

           <label for = "numero">Orden</label>
           <input type="text" name="numero" id="numero" size="2">
  		   <p>	
  		    <label for = "comentario">Comentarios</label>	
            <textarea name="comentario" id="comentario" rows=8 cols=90>
            </textarea>
           </p> 

           
  
           <input type="hidden" name="flag" id = "flag" value="actualizar_resumen" >
           <input type="hidden" name="id_resumen"  value="<?php printf("%s",$id_resumen);?>" > 
           <input type="hidden" name="id_sesion"  value="<?php printf("%s",$id_sesion);?>" > 
  		 <input  type="submit" name="action" value="Aceptar">
  		 <input  type="submit" name="action" value="Rechazar">
  		 <input  type="submit" name="action" value="Cancelar"> 		 	 

</div>

 

<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
<html>
<head>
	<title>

	</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
 



<script type="text/javascript">
$(document).ready(function(){
  $("#nombre").change(function(){
    
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


<?php
header('Content-Type: text/html; charset=ISO-8859-1');



// headers
session_start();
require_once("funciones_ugm.php");


 
connect_to_db();

//set variables
$delete_flag = "borrar_sesion";


// Get nad Post Variabl
$id_sesion = $_GET['id_sesion'];
$borrar_moderador = $_GET['borrar_moderador'];
$flag = $_POST['flag'];
//printf("%s",$flag);
//printf("estamos");


//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
//    cuando navegacion proviene de login
//// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
if ($flag == 'from_login'){

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysql_query("select id_sesion from moderadores_ugm where username = '$username'  and password = '$password' ");
$moderador = mysql_fetch_array($result);
$id_sesion = $moderador['id_sesion'];
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//     Agregar Moderador
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($flag == "agregar_moderador"){
printf("entro");
$id_sesion = $_POST['id_sesion'];
$moderador = $_POST['moderador'];
$email = $_POST['email'];

$result = mysql_query("insert  into moderadores_ugm (id_sesion, nombre, email) values ('$id_sesion', '$moderador', '$email')");


 // SUCCESSFUL
 if($result){
      echo "Successful";
 }
 // NOT SUCCESSFUL
 else {
   echo mysql_error(); //Reason
 }






}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//     borrar Moderador
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($borrar_moderador == "borrar_moderador"){
 $nombre = $_GET['nombre']; 
printf("%s",$id_sesion);

printf("%s",$id_sesion);
printf("%s",$nombre);
mysql_query("delete from moderadores_ugm where nombre='$nombre' and id_sesion='$id_sesion'");

}  

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//     Desplegar datos de la Sesion
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$result = mysql_query("select * from sesiones_ugm where id_sesion = '$id_sesion'"); 
$sesion = mysql_fetch_array($result);


$result = mysql_query("select * from moderadores_ugm where id_sesion = '$id_sesion'");

?>
<div class="div_960" id="borrar_sesion">
<div class="page_title">ORGANIZAR SESION</div>  
<div class="boton_borrar_sesion"><a href="organizar_sesion.php?id_sesion=<?php printf("%s",$id_sesion);?>&flag2=<?php printf("%s",$delete_flag);?>" class="action_element">Borrar Sesion</a></div>	
</div>

<div id="left">
 <h1>Datos de Sesion</h1> 
<?php

if ($_SESSION['rol'] == 'admon'){ 
printf("<form name=\"form\" method=\"post\" action=\"organizar_sesion.php\" accept-charset=\"ISO-8859-1\"> ");
}else{
printf("<form name=\"form\" method=\"post\" action=\"menu_ugm.php\" accept-charset=\"ISO-8859-1\"> ");

}
?> 
<div class="div_400">	
  <p class="input_field"> 
<label for="nombre">Nombre</label> 
 <input type="text" name="nombre" id="nombre" value="<?php printf("$sesion[nombre]"); ?>"> 
</p>
</div>
 

 
 		<div class="div_400">
      <p class="input_field">
 <label for="id_sesion">Clave Sesion</label> 
 <input type="text" name="id_sesion" id="id_sesion" value="<?php printf("$sesion[id_sesion]"); ?>"> 
</p>
  </div>
 

 
		<div class="div_400">
      <p class="input_field">
<label for="id_seccion">Seccion</label> 
 <!--<input type="text" name="id_seccion" id="id_seccion" value="<?php printf("$sesion[id_seccion]"); ?>"> </div>-->
 <select name="id_seccion" id="id_seccion">
  <option value="TIERRA_SOLIDA">Tierra Solida</option>
  <option value="OCEANOGRAFIA">Oceanografia</option>
  <option value="ATMOSFERA">Atmosfera</option>
  <option value="ESPACIO_EXTERIOR">Espacio Exterior</option>
</select>
</p>
</div>
 

 
		<div class="div_400">
      <p class="input_field">
<label for="clave">Clave</label> 
 <input type="text" name="clave" id="clave" value="<?php printf("$sesion[clave]"); ?>"> 
</p>
  </div>
 
 
 
 
<div class="div_400"> 
  <p class="input_field">Tipo de Sesion:</br>
<?php

if ($sesion['tipo_sesion'] == 'REGULAR'){    
  printf("<label  for=\"especial\">Especial</label>"); 
printf("<input  type=\"radio\" name=\"tipo\" id=\"especial\" value=\"especial\" > ");
printf("<label  for=\"regular\">Regular</label> ");
printf("<input  type=\"radio\" name=\"tipo\" id=\"regular\" value=\"regular\" checked>");
 
}
else{

  printf("<label  for=\"especial\">Especial</label>"); 
printf("<input  type=\"radio\" name=\"tipo\" id=\"especial\" value=\"especial\" checked> ");
printf("<label  for=\"regular\">Regular</label> ");
printf("<input  type=\"radio\" name=\"tipo\" id=\"regular\" value=\"regular\">");
}
?>
</p>

</div>  
<input type="hidden" name="flag" id="flag" value="modificar_sesion">
<div class="div_400">
<input type="submit" name="action" value="Salvar Sesion" id="submit">
</div>

</form>
  

</div>

 
<div id="right">

<h1>Moderadores</h1>

 

<!-- 
<p>
<div class="div_400">
<label for="moderador">Nombre:</label> 
<input type="text" name="moderador" id="moderador"> 
</div>
</p>

<p>
<div class="div_400">
<label for="email">Email:</label> 
<input type="text" name="email" id="email"> 
</div>


-->
 


<p>
<div class="div_400" id="agregar_moderador">
<a href="agregar_moderador.php?id_sesion=<?php printf("%s",$id_sesion);   ?>" class="action_element"/>Agregar Moderador</a>	
</div>	
</p>

<div class="resultados"></div>
<?php

if ( $moderadores = mysql_fetch_array($result)){
printf("<ul>"); 
printf("<li>");
printf("<div class=\"div_400\"><p id=\"titulo_lista_moderadores\">Lista de moderadores:</p>");
printf("</li>");
do{
printf("<li>");
printf("<div class=\"lista_moderadores\">%s</div>",$moderadores['nombre']); 
printf("<div class=\"delete_link\"> <a href=\"modificar_sesion.php?id_sesion=$id_sesion&nombre=$moderadores[nombre]&borrar_moderador=borrar_moderador \">Borrar</a></div>");
printf("</li>");
  }while($moderadores = mysql_fetch_array($result));
printf("</ul>");
} 

//printf("hola");
?>

</div>





 </div>

<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>

<script type="text/javascript">

//$('a').on('click',function(e){

//  var id_sesion = '<?php echo $id_sesion; ?>';

//  $('body .resultados').load('holamundo.html .hola');
  //console.log($('#moderador').val());
//  var moderador = 'moderador:'+$('#moderador').val();
//  var email =  $('#email').val();
// console.log(moderador);
// $('#email').val("si");

// var params = [];
//params['moderador'] = moderador;
//params[email] = email;


// $.post('agregar_moderador.php' );
//   e.preventDefault();
  //$.getJSON("agregar_moderador.php?moderador="+moderador,hola);
  // window.location = "agregar_moderador.php?moderador="+moderador;
  //alert(respuesta);
 //,function(respuesta){alert(respuesta);}  
//});


 



</script>




</body>

</html>


 

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

<?php

$titulo = $_POST["titulo"];
$autor = $_POST["nombre"];
$cuerpo = $_POST["cuerpo"];
$id_sesion = $_POST["especial"];
$tipo_resumen = $_POST["tipo_resumen"];

$nombre = $_POST["nombre"];
$paterno = $_POST["paterno"];
$materno = $_POST["materno"];
$correo = $_POST["correo"];
$institucion = $_POST["institucion"];  

$flag = $_POST["flag"];
$id_membresia = $_POST["id_membresia"];
 
//$global_membresia = $_SESSION['global_membresia'];
   

$mod_id_asistente = $_POST['mod_id_asistente'];
$flag_orden = $_GET['flag_orden']; 
$flag_borrar_autor = $_GET['flag_borrar_autor']; 
////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// borrar autor
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag_borrar_autor == "borrar_autor"){
  $id_resumen = $_GET['id_resumen'];
  $id_membresia = $_GET['id_membresia'];
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ver _resumen
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($flag == "ver_resumen"){
//printf("ilpostino");
$clave = $_POST["clave"];

$result = mysql_query("select * from resumen_ugm where clave = '$clave'");
$ver = mysql_fetch_array($result);
$id_resumen = $ver['id_resumen'];

$result = mysql_query("
          select id_membresia 
          from autores_ugm inner join
          asistentes_ugm on 
          autores_ugm.id_asistente = asistentes_ugm.id_asistente 
          where autores_ugm.id_resumen = '$id_resumen'
          ");

$ver = mysql_fetch_array($result);

$id_membresia = $ver['id_membresia'];
 


}



 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// cambiar ordend e autoria
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag_orden == 'up' or $flag_orden == 'down'){

  $id_resumen = $_GET['id_resumen'];
  $id_asistente = $_GET['id_asistente'];
  $id_membresia = $_GET['id_membresia'];

$result = mysql_query("select * from autores_ugm where id_resumen = '$id_resumen' and id_asistente = '$id_asistente'");
$resumenes_row = mysql_fetch_array($result);
$orden = $resumenes_row['orden'];

//escoger el numero de autor mas alto
$result = mysql_query("select max(orden) as orden from autores_ugm where id_resumen = '$id_resumen'");
$max_autor = mysql_fetch_array($result);
printf("%s",$max_autor['orden']);

//si el autor es el mas alto entonces no hacer nada
if ($max_autor['orden'] == $orden and $flag_orden == 'down'){


// de lo contrario mover el orden
}else{
  if ($flag_orden == 'up'){
  $orden2 = $orden - 1;
  }
  else{
  $orden2 = $orden + 1;

  } 

  if ($orden2 != 1){
  $techo = 999;
  $result = mysql_query("update autores_ugm set orden = '$techo' where id_asistente = '$id_asistente'  and id_resumen = '$id_resumen'");
  $result = mysql_query("update autores_ugm set orden = '$orden' where orden = '$orden2' and  id_resumen = '$id_resumen'");
  $result = mysql_query("update autores_ugm set orden = '$orden2' where orden = '$techo' and  id_resumen = '$id_resumen'");  
  }

}//if(max autor == orden) 

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// inserrt resumen
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag == 'insertar_resumen'){

//$id_sesion = $_POST['id_sesion']; 
$presentado = "PRESENTADO"; 
//printf('%s',$id_sesion);
//printf('%s',$flag);

//recuperar id_asistente
 
$result = mysql_query("SELECT * FROM asistentes_ugm where id_membresia ='$id_membresia' ");
$asistente_row = mysql_fetch_array($result);
$id_asistente = $asistente_row["id_asistente"];


// insertar resumen
$result = mysql_query("insert into resumen_ugm ( titulo,  cuerpo,id_sesion,tipo_resumen, status) values ('$titulo', '$cuerpo', '$id_sesion', '$tipo_resumen', '$presentado')  ");

//recuperar id de resumen
$result = mysql_query("SELECT max(id_resumen)  as id_resumen FROM resumen_ugm");
$myrow = mysql_fetch_array($result);

$tipo_autor = 'AUTOR';
$id_resumen = $myrow["id_resumen"];
$_SESSION['global_resumen'] = $id_resumen;

 
//insertar autores
$result = mysql_query("insert into autores_ugm ( id_asistente, id_resumen,tipo_autor, orden) values ('$id_asistente','$id_resumen ', '$tipo_autor' , '1')  ");
}
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// agregar autor
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag == 'agregar_autor'){
 

 $id_membresia = $_POST['id_membresia'];
 $id_resumen = $_POST['id_resumen'];
   // printf("%s",$id_membresia);
   //printf("%s",$id_resumen);

//insertar asistente
$result = mysql_query("insert into asistentes_ugm ( institucion,paterno, materno, nombre, correo) values ('$institucion','$paterno', '$materno', '$nombre', '$correo')  ");

//recuperar el ultimo id asistente
$result = mysql_query("SELECT max(id_asistente)  as asistente_max FROM asistentes_ugm");
$myrow = mysql_fetch_array($result);
$asistente_max = $myrow["asistente_max"];
$tipo_autor = "CO_AUTOR";
//$id_resumen = $_SESSION['global_resumen'];


//obtener el orden de autor mayor en la tabla de autores para poder asignar un orden de autor para el nuevo coautor
$result  = mysql_query("SELECT  max(orden) as coautor_max from autores_ugm where id_resumen = '$id_resumen'");
$maxordenrow = mysql_fetch_array($result);
$coautor_max = $maxordenrow["coautor_max"] + 1;

//insertar autores
$result = mysql_query("INSERT into autores_ugm ( id_asistente, id_resumen,tipo_autor,orden) values ('$asistente_max','$id_resumen', '$tipo_autor',$coautor_max)  "); 

 

}

 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// modificar autor
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag == 'modificar_autor'){
 //modificar asistente

 $id_membresia = $_POST['id_membresia'];
 $id_resumen = $_POST['id_resumen'];


$result = mysql_query("update asistentes_ugm set institucion='$institucion' ,paterno='$paterno' , materno='$materno', nombre='$nombre', correo='$correo'  where id_asistente = '$mod_id_asistente'  ");
 
//printf("test%s",$mod_id_asistente);
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// modificar resumen
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($flag == 'modificar_resumen'){
//printf("noq ue o"); 
$id_resumen = $_POST["id_resumen"];
//printf("%s",$id_resumen);
//insertar autores
$result = mysql_query("update resumen_ugm set  titulo = '$titulo', cuerpo ='$cuerpo' , id_sesion =  '$id_sesion' ,tipo_resumen = '$tipo_resumen' where id_resumen = '$id_resumen'");
} 
 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//datos para desplegar ne pantalla
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
$result = mysql_query("select nombre, paterno, materno,correo, institucion from asistentes_ugm where id_membresia = '$id_membresia'");
//if ($result){printf("hola");}
 
 

 
if ($asis_row = mysql_fetch_array($result)){
$nombres = $asis_row["nombre"] . " " . $asis_row["paterno"] . " " . $asis_row["materno"];
$correo = $asis_row["correo"];
$institucion = $asis_row["institucion"];



$result = mysql_query("select nombre, paterno, materno,correo, institucion from asistentes_ugm where id_membresia = '$id_membresia'");

 }
 
 
//recupera el nopmbre de; autor principal para desplegar ne pantalla
$cadena_autor = "AUTOR";
$result = mysql_query("select * from asistentes_ugm where id_membresia = '$id_membresia'");
$autor_row = mysql_fetch_array($result);
$nombres_autor =  $autor_row["nombre"] . " " . $autor_row["paterno"] . " " . $autor_row["materno"];
//printf("%s",$autor_row["nombre"]);
//printf("holis"); 
//printf("%s",$global_membresia);


//recuperar los datos del resumen para desplegar
//$global_resumen = $_SESSION['global_resumen'];
$result = mysql_query("select * from resumen_ugm where id_resumen = '$id_resumen'");
$myrow = mysql_fetch_array($result);
$titulo = $myrow["titulo"];
$id_sesion = $myrow["id_sesion"];
$tipo_resumen = $myrow["tipo_resumen"];
$cuerpo = $myrow["cuerpo"];
//$institucion = $myrow["institucion"]; 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
?>

<body>
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">
  		
 
  		<div  class="page_title2">
  		  DATOS DE RESUMEN
  		</div>

  		
  		<div class="resumen_etiqueta">
  		  Titulo:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("$titulo");    ?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Primer autor:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("$nombres");?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Correo electronico:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("$correo");?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Institucion:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("$institucion");?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Sesion:
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("$id_sesion");?>
  		</div>
  		<div class="resumen_etiqueta">
  		  Tipo de presentacion
  		</div>
  		<div class="resumen_valor">
  		  <?php printf("$tipo_resumen");?>
  		</div>
  		<div id="reporteresumen">
  		  Resumen
  		</div>  		
  		<div  id="resumenbody">
  		  <?php printf("$cuerpo");?>
  		</div>  
  		
  		<div id="reporteresumen">
  		  Autores
  		  <div id="agregar_autor">
  		    <a href="agregar_autor.php?id_membresia=<?php printf("%s",$id_membresia)?>&id_resumen=<?php printf("%s",$id_resumen)?>"  >agregar autor</a>
  		  </div>
  		</div>   
  		<div class="resumen_etiqueta2">
  		  Nombre
  		</div>    		
  		<div class="resumen_etiqueta2">
  		  INstitucion
  		</div>
  		<div class="resumen_etiqueta2">
  		  Email
  		</div>
      <div class="columna_orden">
        Orden
      </div>   
                  
  		<div class="columna_editar">
  		  Editar
  		</div>  
  				  		  		
  		<div class="resumen_etiqueta2">
  		  <?php printf("$nombres_autor");?>
  		</div>    		
  		<div class="resumen_etiqueta2">
  		  <?php printf("%s",$autor_row["institucion"]);?>
  		</div>
  		<div class="resumen_etiqueta2">
  		  <?php printf("%s",$autor_row["correo"]);?>
  		</div>
      <div class="columna_orden">
            1
      </div> 
      <div class="columna_up">
         <img src="img/up.png">
      </div> 
      <div class="columna_down">
        <img src="img/down.png">
      </div>             
  		<div class="resumen_etiqueta3">
  		  <!--<a href="modificar_autor.php">modificar</a>-->
        Modificar
  		</div>
  		<div class="columna_borrar">
  		  borrar
  		</div>  	
  
  		<?php
  		 
  		//$id_resumen = $_SESSION['global_resumen'];
  		$texto_coautor = "CO_AUTOR";
  		$result = mysql_query("select * from autores_ugm where id_resumen = '$id_resumen' and tipo_autor = '$texto_coautor' order by orden");
  		
  		 $contador = 0;
   
  		$num_rows = mysql_num_rows($result);
  		//printf("%s",$num_rows);
  		if ( $coautor_row = mysql_fetch_array($result)){
  		do {
  		  
  		      $contador ++;
              //printf("%s",$contador);
  		      $id_asistente = $coautor_row["id_asistente"];
  		      $res = mysql_query("select * from asistentes_ugm where id_asistente = '$id_asistente' "); 		      
  		      $a_row = mysql_fetch_array($res);
  		      $nombre_coautor = $a_row["nombre"] . " " . $a_row["paterno"] . " " . $a_row["materno"];
  		      
  		  printf("<div class=\"resumen_etiqueta2\">");
  		      printf("%s",$nombre_coautor); 
  		  printf("</div>"); 
  		  printf("<div class=\"resumen_etiqueta2\">");
  		      printf("%s",$a_row["institucion"]); 
  		  printf("</div>");  
  		  printf("<div class=\"resumen_etiqueta2\">");
  		      printf("%s",$a_row["correo"]); 
  		  printf("</div>");   
        printf("<div class=\"columna_orden\">");
           printf("%s",$coautor_row["orden"]); 
        printf("</div>");   
        printf("<div class=\"columna_up\">");
           printf("<a href=\"resumen_reporte.php?flag_orden=up&id_resumen=$id_resumen&id_asistente=$id_asistente&id_membresia=$id_membresia\"><img src=\"img/up.png \"></a>"); 
        printf("</div>");              
        printf("<div class=\"columna_down\">");
           printf("<a href=\"resumen_reporte.php?flag_orden=down&id_resumen=$id_resumen&id_asistente=$id_asistente&id_membresia=$id_membresia\" ><img src=\"img/down.png \"></a>"); 
        printf("</div>");         
  		  printf("<div class=\"resumen_etiqueta3\">");
  		      printf(" <a href=\"modificar_autor.php?id_asistente=$id_asistente&id_membresia=$id_membresia&id_resumen=$id_resumen \">modificar</a>"); 
  		  printf("</div>"); 
  		  printf("<div class=\"columna_borrar\">");
  		      printf(" <a href=\"borrar_autor.php?id_asistente=$id_asistente&id_membresia=$id_membresia&id_resumen=$id_resumen \">Borrar</a>"); 
  		  printf("</div>");    
           		      
   		}while ($coautor_row = mysql_fetch_array($result));    		   		     		     		
  		}
  	 
  		 
   		printf("<div class=\"botones\">");  
  		  printf(" <a href=\"modificar_resumen.php?id_resumen=$id_resumen&id_membresia=$id_membresia\" ><input type=\"button\" value=\"Modificar\"></a>"); 
          		 printf(" <a href=\"despedida.php?id_resumen=$id_resumen&id_membresia=$id_membresia\" ><input type=\"button\" value=\"Continuar\"></a>"); 
  		 printf("</div> ");
 		?>				
  		 	 	  		  		  		  		  		
  		</div>
  		
  		        
         <div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>

         </div>        
        
     </div>
 

         
 
  		
  		
  		
  		
  		
  		
  		 
</body>


</html>  

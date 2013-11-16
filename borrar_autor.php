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


<body>
	  <div id="wrapper">
     	<div id="header">  
             <p class="center">Uni&oacute;n Geof&iacute;sica Mexicana</p>
             <p class="center">Reuni&oacute;n Anual <?php PRINTf(date("Y"));?></p>  
  		</div>
  		
  		<div id="main">
  		  <?php
  		  
  		  $id_asistente = $_GET['id_asistente'];
        $id_resumen = $_GET['id_resumen'];
        $id_membresia = $_GET['id_membresia'];
   
  		  
  		  $result = mysql_query("select * from asistentes_ugm where id_asistente = '$id_asistente' ");
  		  $row = mysql_fetch_array($result);
  		  
   		  $result = mysql_query("delete from autores_ugm where id_asistente = '$id_asistente'");
   		  
   		  printf("<div id=\"coautor_borrado\">");
  		  $mensaje = " El co-autor " . $row["nombre"] . " " . $row["paterno"] . " " . $row["materno"] . " fue borrado." . " oprima la liga para continuar";
  		  printf(" %s ",$mensaje ); 
  		   
  		   

         //recorrer lso autores 
         $result = mysql_query("select max(orden) as orden from autores_ugm where id_resumen = '$id_resumen'");
         $max_autor = mysql_fetch_array($result);

         for ($i = 3;$i <=$max_autor['orden'];$i++ ){
           $result = mysql_query("select * from autores_ugm where id_resumen = '$id_resumen' and orden = '$i'");
           $mod_asistente = mysql_fetch_array($result);
           printf("%s ya esta afuera",$i);

           //si encuentra un registro con ese orden entra
           if (mysql_num_rows($result) == 1){
             for($j = 2; $j < $i; $j++){
               printf("%s ya esta adentro",$j);
               $result = mysql_query("select * from autores_ugm where id_resumen = '$id_resumen' and orden = '$j'");

               //si encunetra un un numero de orden para le cual no hay registro entra
               if (mysql_num_rows($result) == 0){
                  printf(" ya modifico ");
                  $result = mysql_query("update autores_ugm set orden = '$j' where id_asistente = '$mod_asistente[id_asistente]'  and id_resumen = '$id_resumen'");
                  break;
               }     
             }
           } 
         }
         
  		  ?>
  		  </div>
  		  <a href="resumen_reporte.php?id_resumen=<?php printf("%s",$id_resumen);?>&id_membresia=<?php printf("%s",$id_membresia);?>&flag_borrar_autor=borrar_autor" class="borrar_link">CONTINUAR</a>
  		  
  		  
  		</div>
  		
  		        
         <div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>

         </div>        
        
     </div>
 

         
 
  		
  		
  		
  		
  		
  		
  		 
</body>


</html>  

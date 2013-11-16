<?php  
  
function extrae_sesiones(){  

   connect_to_db();
   
 
   $result = mysql_query("SELECT id_sesion, nombre FROM sesiones_ugm where tipo = 'ESPECIAL'");
   
 
   $contador = 0;
  
   if($myrow = mysql_fetch_array($result))
   {
   do
    {
      $contador++;
      
      printf("<div class=\"radio\">");
      if ($contador == 1){
          printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\" checked=\"checked\"> \n", $myrow["id_sesion"], $myrow["id_sesion"]); 
          printf("<label for=\"%s\">%s</label>",$myrow["id_sesion"],$myrow["nombre"]);
      }else{
          printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\" > \n", $myrow["id_sesion"], $myrow["id_sesion"]); 
          printf("<label for=\"%s\">%s</label>",$myrow["id_sesion"],$myrow["nombre"]); 
      }
      printf("</div>");
      
      if ($contador % 3 == 0 ){
        printf("<br>");
      }
      
    }while ($myrow = mysql_fetch_array($result));
    }else {
     /*printf("No se encontraron registros.<br>\n");*/
    }	
   
    
    
   printf("<br><br><br><br>");
   printf("<div class=\"div_878\">Sesiones Regulares: </div>"	);
    
   $result = mysql_query("SELECT id_sesion, nombre FROM sesiones_ugm where tipo = 'REGULAR'");  
   $contador = 0;
   if($myrow = mysql_fetch_array($result))
   {
   do
    {
      $contador++;
      
      printf("<div class=\"radio\">");
      printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\" > \n", $myrow["id_sesion"],$myrow["id_sesion"]); 
      printf("<label for=\"%s\">%s</label>",$myrow["id_sesion"],$myrow["nombre"]);
      printf("</div>");
      
      if ($contador % 3 == 0 ){
        printf("<br>");
      }
      
    }while ($myrow = mysql_fetch_array($result));
    }else {
     //printf("No se encontraron registros.<br>\n");*/
    }   
   
   
   
   
   
}



function extrae_sesiones_mod($id_resumen){  
   connect_to_db();
 
   $result = mysql_query("SELECT id_sesion, nombre FROM sesiones_ugm where tipo = 'ESPECIAL'");
   
   $res_sesion = mysql_query("SELECT id_sesion FROM resumen_ugm where id_resumen = '$id_resumen' ");
   $id_sesion = mysql_fetch_array($res_sesion);
   
   
   
   $contador = 0;
  
   if($myrow = mysql_fetch_array($result))
   {
   do
    {
      $contador++;
      
      printf("<div class=\"radio\">");
    if ($myrow["id_sesion"] == $id_sesion["id_sesion"]  ){  
      printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\"  checked> \n", $myrow["id_sesion"],$myrow["id_sesion"]); 
    }  
    else{
      printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\" > \n", $myrow["id_sesion"],$myrow["id_sesion"]); 
    }  
      printf("<label for=\"%s\">%s</label>",$myrow["nombre"],$myrow["nombre"]);
      printf("</div>");
      
      if ($contador % 3 == 0 ){
        printf("<br>");
      }
      
    }while ($myrow = mysql_fetch_array($result));
    }else {
     /*printf("No se encontraron registros.<br>\n");*/
    }	
   
    
    
   printf("<br><br><br><br>");
   printf("<div class=\"div_878\">Sesiones Regulares: </div>"	);
    
   $result = mysql_query("SELECT id_sesion, nombre FROM sesiones_ugm where tipo = 'REGULAR'");  
   $contador = 0;
   if($myrow = mysql_fetch_array($result))
   {
   do
    {
      $contador++;
      
      printf("<div class=\"radio\">");
    if ($myrow["id_sesion"] == $id_sesion["id_seison"]  ){       
      printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\" checked > \n", $myrow["id_sesion"],$myrow["id_sesion"]); 
    }  
    else{
      printf("<input  type=\"radio\" name=\"especial\"  value=\"%s\" id=\"%s\" > \n", $myrow["id_sesion"],$myrow["id_sesion"]); 
    }  
      printf("<label for=\"%s\">%s</label>",$myrow["nombre"],$myrow["nombre"]);
      printf("</div>");
      
      if ($contador % 3 == 0 ){
        printf("<br>");
      }
      
    }while ($myrow = mysql_fetch_array($result));
    }else {
     /*printf("No se encontraron registros.<br>\n");*/
    }   
   
   
   
   
   
}

function extrae_datos_autor($global_membresia){

 

   connect_to_db();
   
   //$global_membresia = $_SESSION['global_membresia'];

   //obtienes datos de membresia
 
   $result2 = mysql_query("select * from membresia_ugm where id_membresia = '$global_membresia'");
   $membresia_row = mysql_fetch_array($result2);

   //insertar registro de asistentes solo si el registro no existe anteriormente.
   $result =  mysql_query("select * from asistentes_ugm where id_membresia = '$global_membresia'");
   
 
   if (mysql_num_rows($result) == 0){
      
     $result =  mysql_query("select * from asistentes_ugm where nombre = '$membresia_row[nombre]' and paterno = '$membresia_row[apaterno]' and materno = '$membresia_row[amaterno]'");
    
       if (mysql_num_rows($result) == 0){
      
         $result = mysql_query("insert into asistentes_ugm ( institucion,paterno, materno, nombre, correo, id_membresia) values ('$membresia_row[institucion]','$membresia_row[apaterno]', '$membresia_row[amaterno]', '$membresia_row[nombre]', '$membresia_row[email]', '$membresia_row[id_membresia]')  ", $db);
       }else{
 
         $result = mysql_query("update asistentes_ugm set id_membresia = '$global_membresia' where nombre = '$membresia_row[nombre]' and paterno = '$membresia_row[apaterno]' and materno = '$membresia_row[amaterno]'");
       }  
   }else{

 
 
   }




 
   // extraer datos de asistente
   $result = mysql_query("SELECT nombre, paterno,materno,correo,institucion FROM asistentes_ugm where id_membresia = '$global_membresia' ");
   
   if($myrow = mysql_fetch_array($result))
   {
   do
    {
     
      printf("<div class=\"div_219\">");
  	  printf("<label class=\"label_top\" for=\"nombre\">Nombre</label>");
  	  printf("<input  type=\"text\" name=\"nombre\" id=\"nombre\" class=\"field\"  value=\"%s\" disabled=\"true\"> ",$myrow["nombre"]);
  	  printf("</div>");

      printf("<div class=\"div_219\">");
  	  printf("<label class=\"label_top\" for=\"paterno\">Apellido Paterno</label>");
  	  printf("<input  type=\"text\" name=\"paterno\" id=\"paterno\" class=\"field\"  value=\"%s\" disabled=\"true\"> ",$myrow["paterno"]);
  	  printf("</div>");
  	  
      printf("<div class=\"div_219\">");
  	  printf("<label class=\"label_top\" for=\"materno\">Apellido Materno</label>");
  	  printf("<input  type=\"text\" name=\"materno\" id=\"materno\" class=\"field\"  value=\"%s\" disabled=\"true\"> ",$myrow["materno"]);
  	  printf("</div>");
  	  
      printf("<div class=\"div_219\">");
  	  printf("<label class=\"label_top\" for=\"correo\">Correo Electronico</label>");
  	  printf("<input  type=\"text\" name=\"correo\" id=\"correo\" class=\"field\"  value=\"%s\" disabled=\"true\"> ",$myrow["correo"]);
  	  printf("</div>");  	    	    			      
  			            

      printf("<div class=\"div_800\">"); 
  	  printf("<label class=\"label_top\" for=\"institucion\">Institucion</label>");
  	  printf("<input  type=\"text\" name=\"institucion\" id=\"institucion\"  class=\"div_800\" value=\"%s\" disabled=\"true\"> ",$myrow["institucion"]); 
       printf("</div>"); 
 
      
    }while ($myrow = mysql_fetch_array($result));
    }else {
     /*printf("No se encontraron registros.<br>\n");*/
    }	







}


function get_dia_semana_esp($dia_semana){

 if ($dia_semana == 'Monday'){

return 'Lunes';

}elseif ($dia_semana == 'Tuesday'){

return 'Martes';
}elseif ($dia_semana == 'Wednesday'){

  return 'Miercoles';
}elseif ($dia_semana == 'Thursday'){
return 'Jueves';
  
}elseif ($dia_semana == 'Friday'){

  return 'Viernes';
}elseif ($dia_semana == 'Saturday'){

  return 'Sabado';
}elseif ($dia_semana == 'Sunday'){
return 'Domingo';
  
}else{

  return 'A';
}


}

function get_month_esp($mes){

if ($mes == 'January'){

return 'Enero';

}elseif ($mes == 'February'){

return 'Febrero';
}elseif ($mes == 'March'){

  return 'Marzo';
}elseif ($mes == 'April'){
return 'Abril';
  
}elseif ($mes == 'May'){

  return 'mayo';
}elseif ($mes == 'June'){

  return 'Junio';
}elseif ($mes == 'July'){
return 'Julio';
  
}elseif ($mes == 'August'){

return 'Agosto';
}elseif ($mes == 'September'){

  return 'Septiembre';
}elseif ($mes == 'October'){
return 'Octubre';
  
}elseif ($mes == 'November'){

  return 'Noviembre';
}elseif ($mes == 'December'){

  return 'Diciembre';



}else{

  return 'A';
}


}







function connect_to_db(){

   $db = mysql_connect("158.97.28.41","raugm", "raUgm");
   mysql_select_db("resumenes2013", $db);
  //********************************************************************************************
   //   $db = mysql_connect("158.97.30.46","alex", "abc123");
   //mysql_select_db("pruebas", $db);

  
}
?>   

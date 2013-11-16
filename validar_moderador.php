<html>
<head>
	<title>

	</title>
	
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

// headers
session_start();
require_once("funciones_ugm.php");
connect_to_db();


// POST and GET variables
$username = $_POST['username'];
$password = $_POST['password'];
$flag     = $_POST['flag'];


//validate username and password

$result = mysql_query("select * from moderadores_ugm where username = '$username' and password = '$password'");
$num_rows = mysql_num_rows($result);
$moderador = mysql_fetch_array($result);
 
 
 
 
if ( $num_rows == 1){

    $_SESSION['rol'] = $moderador['rol'];
    printf("<div class=\"page_title2\" >Bienvenido! Oprime la liga de abajo para continuar</div>");
    if($moderador['rol'] == 'moderador'){
    	if ($flag == 'moderar_resumen'){
            printf("<p class=\"center\"><a href=\"resumen_sesion.php?id_sesion=$moderador[id_sesion]\">Continuar</a></p>");
        }elseif($flag == 'moderar_sesion'){
            printf("<p class=\"center\"><a href=\"modificar_sesion.php?id_sesion=$moderador[id_sesion]\">Aqui</a></p>");
        }else{

        	echo ".";
        }
    }elseif($moderador['rol'] == 'admon'){
    	        //para saber si se queire moderar resumen o moderar sesion
        if ($flag == 'moderar_resumen'){
            printf("<p class=\"center\"> <a href=\"mostrar_resumenes.php\">Aqui</a>  </p>");
        }elseif($flag == 'moderar_sesion'){
            printf("<p class=\"center\"> <a href=\"organizar_sesion.php\">Aqui</a>  </p>");
        } 
        else{

            echo ".";
        }  
    }

}else{
    printf("<div class=\"page_title2\" >Usuario y password no validos! Oprime la liga de abajo para regresar</div>");
 
   
    printf("<p class=\"center\"><a href=\"login_organizar_resumenes.php\">Regresar</a></p>");


}
?>


</div>



<div id="footer">
<p class="center">Uni&oacute;n Geof&iacute;sica Mexicana, Reuni&oacute;n Anual <?php date("Y"); ?></p>
<p class="center">Del 3 al 8 de Noviembre, Puerto Vallarta, Jalisco, M&eacute;xico</p>


</div>

</div>


</body>

</html>
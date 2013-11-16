<?php
require_once("funciones_ugm.php");


 
connect_to_db();
$clave_resumen = $_GET['clave'];





$result = mysql_query("select * from resumen_ugm where clave = '$clave_resumen'");
$resumen_datos = mysql_fetch_array($result);

if($clave_resumen == $resumen_datos['clave']){
 


echo "true";

}else{

echo "false";


}




?>
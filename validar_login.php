<?php
require_once("funciones_ugm.php");


 
connect_to_db();
$id_membresia = $_GET['id_membresia'];





$result = mysql_query("select * from membresia_ugm where id_membresia = $id_membresia");
$membresia = mysql_fetch_array($result);

if($id_membresia == $membresia['id_membresia']){
 


echo "true";

}else{

echo "false";


}




?>
<html>
<head>
	<title>

	</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />	
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>

<body> 
	  <div id="wrapper">
     	<div id="header">  
  	          
  		</div>
  		
  		<div id="main">	

 
<button type="button" id="button">Get Email</button> 
 


</div>



<div id="footer">



</div>

</div>
<script type="text/javascript">
$('#button').on('click',function(e){

var decNumber = 0;
 
var hexString = '';

for (var i = 1; i < 1000000; i++) {

  decNumber = decNumber + i;	
  hexString = decNumber.toString(16);
  var regex = /\d/

  var finds = hexString.match(regex);
  var len   = hexString.length;

  if (! finds && len == 9){
 
    document.write('<p>'+ hexString + '</p>');
    document.write('</br>');
    document.write(i);
    var proof = i * (i + 1)/2;
    var hexproof = proof.toString(16);
    document.write('</br>');
    document.write(hexproof);
    break;
}
else{
  


}
}




});
</script>	
</body>

</html>
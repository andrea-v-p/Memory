<!DOCTYPE html>
<html>
<head>
	<title>Memory</title>
	<link rel="stylesheet" href="style.css">
	<script src="memory.js"></script> 
</head>
<body>
<?php 
	$col = 2;
	$fil = 2;
	$cont =0;
	$numeros = array( 1, 2, 1, 2);
	shuffle($numeros);
	echo ("<table>");

		for ($i=0; $i < $col ; $i++) { 
			echo ("<tr>");
			for ($x=0; $x < $fil ; $x++) {
				echo ("	<td><div class=\"container\">
							<img src=\"imagenes/$numeros[$cont].jpeg\" style=\"width:120px;height:180px;\" class=\"back\">
							<img src=\"imagenes/dorso.jpeg\" style=\"width:120px;height:180px;\" class=\"front\">
						</div></td>");
				$cont++;
			}
			echo ("</tr>");
		
	}
	echo ("</table>");
?>


<button id="start" onclick="inicio()">
  ¡Comenzar el juego!
</button>

</body>
</html>
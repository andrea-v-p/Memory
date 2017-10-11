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
	$cartas2X2 = array( 1, 2, 1, 2);
//	$cartas6X6 = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
	shuffle($numeros);
	echo ("<table>");

		for ($i=0; $i < $col ; $i++) { 
			echo ("<tr>");
			for ($x=0; $x < $fil ; $x++) {
				echo ("	<td><div class=\"container\">
							<img src=\"imagenes/$cartas2X2[$cont].jpeg\" style=\"width:120px;height:180px;\" class=\"back\">
							<img src=\"imagenes/dorso.jpeg\" style=\"width:120px;height:180px;\" class=\"front\">
						</div></td>");
				$cont++;
			}
			echo ("</tr>");
		
	}
	echo ("</table>");
?>


<button id="restart" onclick="inicio()">
  ¡Reiniciar!
</button>

</body>
</html>

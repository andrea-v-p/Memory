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
	// cartas4X4 array temporal falta añadir el resto de imagenes
		// 16 CARTAS -- 8 PAREJAS
	$cartas4X4 = array( 1, 1, 2, 2);
	shuffle($cartas4X4);
	echo ("<table>");
		for ($i=0; $i < $col ; $i++) { 
			echo ("<tr>");
			for ($x=0; $x < $fil ; $x++) {
				echo ('	<td><div class="container" onclick=" flip('.$cont.')">
							<img src="imagenes/'.$cartas4X4[$cont].'.png" style="width:120px;height:180px;" class="front" id="'.$cont.'f">
							<img src="imagenes/dorso.png" style="width:120px;height:180px;" class="back" id="'.$cont.'b">
						</div></td>');
				$cont++;
			}
			echo ("</tr>");
	}
	echo ("</table>");
?>

	<button id="restart">Reiniciar</button>

</body>
</html>

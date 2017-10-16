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
	$fil = 4;
	$total = $col*$fil;
	$cont =0;
	// cartas4X4 array temporal falta añadir el resto de imagenes
		// 16 CARTAS -- 8 PAREJAS
			// 5, 6, 7, 8,  , 5, 6, 7, 8
	$cartas4X4 = array( 1, 2, 3, 4, 1, 2, 3, 4);
	shuffle($cartas4X4);
	echo ("<table>");
		for ($i=0; $i < $col ; $i++) { 
			echo ("<tr>");
			for ($x=0; $x < $fil ; $x++) {
				echo ('	<td><div class="container" onclick="click1('.$cont.', '.$total.')">
							<img src="Imagenes/'.$cartas4X4[$cont].'.png" style="width:120px;height:180px;" class="frontFlip" id="'.$cont.'f">
							<img src="Imagenes/dorso.png" style="width:120px;height:180px;" class="backFlip" id="'.$cont.'b">
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

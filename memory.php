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
	echo ("<div id='tabla'> <table>");
		for ($i=0; $i < $col ; $i++) { 
			echo ("<tr>");
			for ($x=0; $x < $fil ; $x++) {
				echo ('	<td><div class="container" onclick="click1('.$cont.', '.$total.')">
							<img src="Imagenes/'.$cartas4X4[$cont].'.png" style="width:160px;height:230px;" class="frontFlip" id="'.$cont.'f">
							<img src="Imagenes/dorso.png" style="width:160px;height:230px;" class="backFlip" id="'.$cont.'b">
						</div></td>');
				$cont++;
			}
			echo ("</tr>");
	}
	echo ("</table>");
?>
	<button id="restart" onclick="location.reload();">Reiniciar</button>
	<button id="scoreboard" disabled="true">Marcador</button>

	<!-- <div id="formu" class="formulario">
		<form action="marcador.php" method="post" >
		 	<p>Nombre: <input type="text" name="nombre" maxlength="20" /></p>
		 	<p>Intentos: <input type="text" name="intentos" maxlength="4" id="inten" disabled /></p>
		 	<p><input type="submit" disabled="true" /></p>
		</form>
	</div> -->

</body>
</html>

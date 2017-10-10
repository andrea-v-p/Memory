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
				echo "$cont";
				echo ("<td><img src=\"imagenes/$numeros[$cont].jpeg\" style=\"width:120px;height:180px;\" name=\"cara\"></td>");
				$cont++;
			}
			echo ("</tr>");
		
	}
	echo ("</table>");
?>



<br><br><br><br><br><br><br><br>
				<div id="flip-container">
					<div id="card1" class="card">
					<div class="front">
						<img src="imagenes/dorso.jpeg" style="width:120px;height:180px;" name="dorso">
					</div>
						<div class="back">
							<img src="imagenes/1.jpeg" style="width:120px;height:180px;" name="cara">
						</div>
					</div>
				</div>
				<div id="flip-container">
					<div id="card1" class="card">
					<div class="front">
						<img src="imagenes/dorso.jpeg" style="width:120px;height:180px;" name="dorso">
					</div>
						<div class="back">
							<img src="imagenes/2.jpeg" style="width:120px;height:180px;" name="cara">
						</div>
					</div>
				</div>	


<!-- 		<img src="imagenes/dorso.jpeg" style="width:120px;height:180px;" name="dorso">
		<img src="imagenes/1.jpeg" style="width:120px;height:180px;" name="cara">
	
		<img src="imagenes/dorso.jpeg" style="width:120px;height:180px;" name="dorso">
		<img sr c="imagenes/dorso.jpeg" style="width:120px;height:180px;" name="dorso"> -->



<button id="start" onclick="inicio()">
  ¡Comenzar el juego!
</button>

</body>
</html>
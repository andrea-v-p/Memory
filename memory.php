<?php
	session_start();
	$_SESSION["nick"] = $_POST['nick'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Memory</title>
	<link rel="stylesheet" href="style.css">
	<script src="memory.js"></script> 
</head>
<body onload="iniTiempo()">
<div class="intent" id="intent">Intentos: 0</div>
<div class="crono" id="crono">
	<p id="minutos">00</p>	<p>:</p>	<p id="segundos">00</p>
</div>
<?php 
	$col = 0;
	$fil = 0;
	$wid = 0;
	$hei = 0;
	$clase = 'container1';
	
	$option = $_POST['choice'];

	if($option=="easy"){
		// 16 CARTAS -- 8 PAREJAS
		$col = 4;
		$fil = 4;
		$listaCartas = array( 1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8);
		$wid = 100;
		$hei = 140;
		$clase = 'container';

	}elseif ($option=="standard") {
		// 36 CARTAS -- 18 PAREJAS
		$col = 6;
		$fil = 6;
		$listaCartas = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
		$wid = 60;
		$hei = 80;
		$clase = 'container2';

	}elseif ($option=="hard") {
		// 64 CARTAS -- 32 PAREJAS
		$col = 8;
		$fil = 8;
		$listaCartas = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32);
		$wid = 50;
		$hei = 60;
		$clase = 'container3';

	}
	
	$total = $col*$fil;
	$cont =0;
	
	if (!isset($_SESSION["cartas"])) {	
		shuffle($listaCartas);
		$_SESSION["cartas"] = $listaCartas;
	}else {
		
		$listaCartas = $_SESSION["cartas"];
	}
	
	
	echo ("<p style='color:white;'>".$_SESSION["nick"]."</p>");
	echo ("<div id='tabla'> <table>");
		for ($i=0; $i < $col ; $i++) { 
			echo ("<tr>");
			for ($x=0; $x < $fil ; $x++) {
				echo ('	<td><div class='.$clase.' onclick="click1('.$cont.', '.$total.')">
							<img src="Imagenes/'.$listaCartas[$cont].'.png" style="width:'.$wid.'px;height:'.$hei.'px;" class="frontFlip" id="'.$cont.'f">
							<img src="Imagenes/dorso.png" style="width:'.$wid.'px;height:'.$hei.'px;" class="backFlip" id="'.$cont.'b">
						</div></td>');
				$cont++;
			}
			echo ("</tr>");
	}
	echo ("</table>");

	echo ("<a href='inicio.php'><button id='restart'>Reiniciar</button></a>
	<button id='hlp' onclick='ayuda($total)'>Ayuda: 3</button>");

	echo ("<div id='marcador' class='formu'>
		<form action='marcador.php' method='post' >");
		 	echo ("<p>Nombre: <input type ='text' name='name' maxlength='10' readonly='true' value='".$_SESSION['nick']."' /></p>");
		 	echo ("<p>Intentos: <input type='text' name='intento' maxlength='4' readonly='true' id='intentos' /></p>
		 	<p><input value='Envia' type='submit' name='go'/></p>
		</form>
	</div> ");
?>

</body>
</html>

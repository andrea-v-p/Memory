<!DOCTYPE html>
<html>
	<head>
		<title>Marcador</title>
	</head>
	<body>
		<?php
		function WriteDoc($nombre, $intentos){
			$myfile = fopen("marcador.txt", "a+");

				$txt = $nombre." ".$intentos."\n";
				fwrite($myfile, $txt);

			fclose($myfile);
		}

		function ReadDoc($nombre, $intentos){
			$lines = array();
			$myfile = fopen("marcador.txt", "r");

			 while(!feof($myfile)) {
			 	// $linea Recoge una linea
				$linea = fgets($myfile);

				// $text separa el nombre del resultado
				$text = explode(" ",$linea);
				echo $text[0];
				//echo $text[1].'<br>';
			

			} 

		 	fclose($myfile);
		 	return $lines;
		}


		$nombre = $_POST["name"];
		$intentos = $_POST["intento"];
		$result = array();
		WriteDoc($nombre, $intentos);

		ReadDoc($nombre, $intentos);
		?>

	</body>
</html>

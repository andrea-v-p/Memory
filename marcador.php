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
			echo "HOLA";
		}

		// function ReadDoc($nombre, $intentos){
		// 	$lines = array();
		// 	$text = array();
		// 	$myfile = fopen("marcador.txt", "r");
		// 	   while ($line = fgets($myfile)) !== false) {
		// 	        text= fgets($myfile);
		// 			array_push($lines,);
		// 	   	}

		// 	fclose($myfile);
		// }


		$nombre = $_POST["name"];
		$intentos = $_POST["intento"];
		WriteDoc($nombre, $intentos);



		?>

	</body>
</html>

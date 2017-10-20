<!DOCTYPE html>
<html>
	<head>
		<title>Marcador</title>
		<link rel="stylesheet" href="style.css">
		<script src="memory.js"></script> 
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
			$array = array();
			$text2 = array();

			while(!feof($myfile)) {
			 	// $linea Recoge una linea
				$linea = fgets($myfile);

				// $text separa el nombre del resultado
				$text = explode(" ",$linea);

				array_push($text2, $text[1]);
				array_push($text2, $text[0]);

				if( count($text2)>1 ) {
					//echo ("<td>".$text[0]."</td><td>".$text[1]."</td>");
					array_push($array, $text2);
				}
				
				
				
			} 
		 	fclose($myfile);
		 	return $array;
		}


		$nombre = $_POST["name"];
		$intentos = $_POST["intento"];
		
		WriteDoc($nombre, $intentos);
		$result =ReadDoc($nombre, $intentos);

		asort($result);

		echo ("<table id='scoreTable' calss='scoreTable'>
			<tr> <th>NAME</th> <th>SCORE</th> </tr>");
			for($x=0; $x <count($result); $x++){
				echo ("<tr>");

					echo ("<td>".$result[$x][0]."</td>");
					echo ("<td>".$result[$x][1]."</td>");

				echo ("</tr>");
			}
		echo ("</table>");
		?>

	</body>
</html>

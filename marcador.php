<?php 
	session_start();
	$_SESSION["marcadorSesion"];
	$_SESSION["sesion"];
?>
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
				$txt = "\n".$nombre." ".$intentos;
				fwrite($myfile, $txt);
			fclose($myfile);
		}
		function ReadDoc($nombre, $intentos){
			$linias = count(file("marcador.txt"));
			$myfile = fopen("marcador.txt", "r");
			$array = array();
			while(!feof($myfile)) {
					
					$text2 = array();
				 	// $linea Recoge una linea
					$linea = fgets($myfile);
					// $text separa el nombre del resultado
					$text = explode(" ",$linea);
					
					array_push($text2, (int)$text[1]);
					array_push($text2, $text[0]);
					
					if( count($text2)>1 ) {
						//echo ("<td>".$text[0]."</td><td>".$text[1]."</td>");
						array_push($array, $text2);
					}
			} 
		 	fclose($myfile);
		 	return $array;
		}
		
		
		function guardaSesion ($nombre, $intentos){
		//Marcador de Sesion
			$_SESSION["marcadorSesion"]= array();
			$_SESSION["sesion"]= array();
			
			array_push($_SESSION["sesion"], (int)$intentos);
			array_push($_SESSION["sesion"],$nombre);
			 
				
				
			array_push($_SESSION["marcadorSesion"], $_SESSION["sesion"]); 
		}
	
		function imprimeSession($sesion){
		//sort($sesion);
		echo ("<table calss='scoreTable'>
			<tr> <th>SCORE</th> <th>NAME</th> </tr>");
			for($x=0; $x <count($sesion); $x++){
				echo ("<tr>");
					echo ("<td>".$sesion[$x][0]."</td>");
					echo ("<td>".$sesion[$x][1]."</td>");
				echo ("</tr>");
			}
		echo ("</table>");
			
		}

		function imprimeGlobal($result){
		sort($result);
 		echo ("<table id='scoreTable' calss='scoreTable'>
 			<tr> <th>SCORE</th> <th>NAME</th> </tr>");
 			for($x=0; $x <count($result); $x++){
 				echo ("<tr>");
 
 					echo ("<td>".$result[$x][0]."</td>");
 					echo ("<td>".$result[$x][1]."</td>");
 
 				echo ("</tr>");
 			}
 		echo ("</table>");
		}
		
		
		$_SESSION["marcadorSesion"]= array();
		$nombre = $_POST["name"];
		$intentos = $_POST["intento"];
		
		WriteDoc($nombre, $intentos);
		$_SESSION["marcadorSesion"] = guardaSesion($nombre, $intentos);
		
		//$_SESSION["marcadorSesion"];
		$result = ReadDoc($nombre, $intentos);
		
		imprimeGlobal($result);
		echo ("<br><br><br>");
		imprimeSession($_SESSION["marcadorSesion"]);
		?>

	</body>
</html>
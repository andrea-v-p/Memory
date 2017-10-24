//contador de intentos que se ha hecho en la partida
var intentos = 0;
//Contador de las ayudas restantes.
var ayudas=3;

//Inicializacion de los audios.
var ohno = new Audio('Sonidos/baymax.mp3');
var coin = new Audio('Sonidos/coin.mp3');
var item = new Audio('Sonidos/kingdom.mp3');
var win = new Audio('Sonidos/win.mp3');


// Funcion distribuidora
function click1($identificador, $totalCartas){
	var tCarta = $totalCartas;
	//variable que almacena el resultado de queCartas().
	var cards;
	var identificador = $identificador;

	if (cuantasCartas(tCarta) == 0){
		if(compruebaMisma(identificador)){
			item.play();
			flip(identificador);
		}
	}else if (cuantasCartas(tCarta) == 1){
		if(compruebaMisma(identificador)){
			intentos ++;
			flip(identificador);
			
			// Actualiza el numero de intentos
			document.getElementById("intent").innerHTML = "Intentos: "+ intentos;
			document.getElementById("intentos").value = intentos;

			cards = queCartas(tCarta);
			idCards = queCartasId(tCarta);
			

			if (compruebaIguales(idCards)==true) {
				coin.play();
				bloquear(idCards);

				if(compruebaFinal(tCarta)){
					win.play();
					parar();
					document.getElementById("marcador").className = "formuV";
				}
			}else{
				ohno.play();
				setTimeout(dobleFlip,1000, idCards);
			}
		}
	}
}


// Cuenta cuantas cartas estan de cara
function cuantasCartas(cartas) {
	var carta=0;
	var id;
	for (var i = 0; i < cartas; i++){
		id = document.getElementById(i+"f");
		if(id.className == "front"){
			carta ++;
		}
	}
	return carta;
}


// Comprueba que las 2 cartas son iguales
function compruebaIguales(cards) {
	var id1 = document.getElementById(cards[0]+'f').src;
	var id2 = document.getElementById(cards[1]+'f').src;
	
	if(id1 == id2){
		return true;
	}else{
		return false;
	}
}


// Verifica que no se pueda volver a dar la vuelta a la carta
function compruebaMisma(i){
	if(document.getElementById(i+"f").className == ("frontFlip") ){
		return true;
	}else{
		return false;
	}
}


// Comprueba si se ha finalizado el juego
function compruebaFinal(tCarta) {
	var total=0;
	var id;
	for(var i = 0; i < tCarta; i++){
		id = document.getElementById(i+"f");
		if (id.className == "frontFlip2"){
			total++;
		}
	}
	if (total == tCarta){
		return true;
	}else{
		return false;
	}
}

// Devuelve una array con el SRC de las 2 cartas que estan boca arriba
function queCartas(tCarta) {
	var cards = new Array();
	var cartas = tCarta;
	var id;
	for (var i = 0; i < cartas; i++) {
		id = document.getElementById(i+"f");
		if(id.className == "front"){
			cards.push(id);
		}
	}
	return cards;
}

// Devuelve una array con el ID de las 2 cartas que estan boca arriba
function queCartasId(tCarta) {
	var cartasId = new Array();
	var carta = tCarta
	var id;
	for (var y = 0; y < carta; y++) {
		id = document.getElementById(y+"f");
		if(id.className == "front"){
			cartasId.push(y);
		}
	}
	return cartasId;
}

//Voltea la carta que llega
function flip(identificador){
	var x = document.getElementById(identificador+"f");

	if (x.className=="frontFlip"){
		document.getElementById(identificador+"b").className = "back";
		document.getElementById(identificador+"f").className = "front";
	}else if(x.className=="front"){
		document.getElementById(identificador+"b").className = "backFlip";
		document.getElementById(identificador+"f").className = "frontFlip";
	}
}

// Cambia la clase de las parejas que se han acertado evitando que se puedan volver a girar
function bloquear(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip2";
	document.getElementById(idCards[0]+"f").className = "frontFlip2";

	document.getElementById(idCards[1]+"b").className = "backFlip2";
	document.getElementById(idCards[1]+"f").className = "frontFlip2";
}

// Devuelve las parejas que has fallado boca abajo
function dobleFlip(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip";
	document.getElementById(idCards[0]+"f").className = "frontFlip";

	document.getElementById(idCards[1]+"b").className = "backFlip";
	document.getElementById(idCards[1]+"f").className = "frontFlip";
}


// Destapa todas las cartas que tienen la clase frontFlip si ya que las que estan destapadas tendran la clase frontFlip2
function ayuda(totalCartas){
	if (ayudas>0){
		ayudas--;
		intentos = intentos+5;

		document.getElementById("hlp").innerHTML = "ayuda: "+ ayudas;
		document.getElementById("intent").innerHTML = "Intentos: "+ intentos;

		for(var x=0;x<totalCartas;x++){
			var y = document.getElementById(x+"f");
			if (y.className=="frontFlip"){
				document.getElementById(x+"b").className = "back";
				document.getElementById(x+"f").className = "front";
			}
		}
		setTimeout(taparAyuda,3000, totalCartas);
	}
}
// ayuda setTimeout ->Al cabo de 3 segundos se volveran a tapar
function taparAyuda(totalCartas){
	for(var x=0;x<totalCartas;x++){
		var y = document.getElementById(x+"f");
		if (y.className=="front"){
			document.getElementById(x+"b").className = "backFlip";
			document.getElementById(x+"f").className = "frontFlip";
		}
	}
}

//AÑADIR VARIABLES EN EL PHP
//CRONO
var time; 
var seconds = 0; 
var minutes = 0;
 
function iniTiempo(){
    seconds++;
    time = setTimeout("iniTiempo()",1000);
    if(seconds > 59) {
		seconds = 0; 
		minutes++;
		console.log(seconds);
	}
	// Mostar segundos
    document.getElementById("minutos").innerHTML = minutes;
    // Mostar segundos
    document.getElementById("segundos").innerHTML = seconds;
}
function parar () {
	clearInterval(time);
}


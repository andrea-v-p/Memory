var intentos = 0;

// Funcion distribuidora
function click1($identificador, $totalCartas){
	var tCarta = $totalCartas;
	var cards;
	var identificador = $identificador;

	if (cuantasCartas(tCarta) == 0){
		if(compruebaMisma(identificador)){
			flip(identificador);
		}
	}else if (cuantasCartas(tCarta) == 1){
		if(compruebaMisma(identificador)){
			intentos ++;
			flip(identificador);

			cards = queCartas(tCarta);
			idCards = queCartasId(tCarta);
			

			if (compruebaIguales(idCards)==true) {
				bloquear(idCards);

				if(compruebaFinal(tCarta)){
					alert(intentos);

				// Intento de marcador
					// document.getElementById("inten").innerHTML = intentos;
					// document.getElementById("submit").disabled = "false";
					
				}
			}else{
				setTimeout(dobleFlip,1500, idCards);
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

// Cambia la clase de las cartas evitando que se puedan volver a girar
function bloquear(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip2";
	document.getElementById(idCards[0]+"f").className = "frontFlip2";

	document.getElementById(idCards[1]+"b").className = "backFlip2";
	document.getElementById(idCards[1]+"f").className = "frontFlip2";
}

// Devuelve las cartas boca abajo
function dobleFlip(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip";
	document.getElementById(idCards[0]+"f").className = "frontFlip";

	document.getElementById(idCards[1]+"b").className = "backFlip";
	document.getElementById(idCards[1]+"f").className = "frontFlip";
}

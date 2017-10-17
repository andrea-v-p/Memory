var intentos = 0;

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
					document.getElementById("formu").innerHTML = intentos;
					document.getElementById("formu").className = "formularioVisible";
					
				}
			}else{
				setTimeout(dobleFlip,1500, idCards);
			}
		}
	}
}

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

function compruebaIguales(cards) {
	var id1 = document.getElementById(cards[0]+'f').src;
	var id2 = document.getElementById(cards[1]+'f').src;
	
	if(id1 == id2){
		return true;
	}else{
		return false;
	}
}

function compruebaMisma(i){
	if(document.getElementById(i+"f").className == ("frontFlip") ){
		return true;
	}else{
		return false;
	}
}

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

function bloquear(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip2";
	document.getElementById(idCards[0]+"f").className = "frontFlip2";

	document.getElementById(idCards[1]+"b").className = "backFlip2";
	document.getElementById(idCards[1]+"f").className = "frontFlip2";
}

function dobleFlip(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip";
	document.getElementById(idCards[0]+"f").className = "frontFlip";

	document.getElementById(idCards[1]+"b").className = "backFlip";
	document.getElementById(idCards[1]+"f").className = "frontFlip";
}

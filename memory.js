function click1($identificador, $totalCartas){
	var intentos = 0;
	var tCarta = $totalCartas;
	var cards;
	var identificador = $identificador;
	
	//REVISAR
	if(compruebaMisma(identificador)){
		if (cuantasCartas(tCarta) == 0){
			flip(identificador);

		}else if (cuantasCartas(tCarta) == 1){
			flip(identificador);

			cards = queCartas(tCarta);
			idCards = queCartasId(tCarta);
			intentos ++;

			if (compruebaIguales(idCards)==true) {
				
				//REVISAR
				dobleFlip(idCards);

				if(compruebaFinal(tCarta)){
					alert(intentos);
				}
			}else{
				flip(idCards[0]);
				flip(idCards[1]);
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
	console.log(id1, id2);
	if(id1 == id2){
		return true;
	}else{
		return false;
	}
}

// REVISAR
function compruebaMisma(i){
	if(document.getElementById(i+"f").className == ("front") )
}

function compruebaFinal(tCarta) {
	var total;
	for(var i = 0; i < tCarta; i++){
		if (document.getElementById(i+"b").className == "backFlip2"){
			total++;
		}
		if (total == tCarta){
			return true;
		}else{
			return false;
		}
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

//REVISAR	
function dobleFlip(idCards){
	document.getElementById(idCards[0]+"b").className = "backFlip2";
	document.getElementById(idCards[0]+"f").className = "frontFlip2";

	document.getElementById(idCards[1]+"b").className = "backFlip2";
	document.getElementById(idCards[1]+"f").className = "frontFlip2";
}

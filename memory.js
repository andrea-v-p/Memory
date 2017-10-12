function flip($identificador){
	var x = document.getElementById($identificador+"b");

	if (x.className=="backFlip"){
		document.getElementById($identificador+"b").className = "back";
		document.getElementById($identificador+"f").className = "front";
	}else if(x.className=="back"){
		document.getElementById($identificador+"b").className = "backFlip";
		document.getElementById($identificador+"f").className = "frontFlip";
}

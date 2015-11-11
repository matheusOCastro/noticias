function SomenteNumeroCoord(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58 || tecla === 45)) return true;
    else{
    	if (tecla===8 || tecla===0) return true;
	else  return false;
    }
}

function SomenteNumeroDouble(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58 || tecla ===46)) return true;
    else{
    	if (tecla===8 || tecla===0) return true;
	else  return false;
    }
}



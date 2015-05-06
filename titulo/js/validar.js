function numero(e) {
var codigo; 
codigo = (document.all) ? e.keyCode : e.which; 
if (codigo > 31 && (codigo < 48 || codigo > 57)) {
return false;
}
return true;
}

function validar(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Ñ-Za-ñ-z\s]/;
	
	// 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te);// 6
	
} 

function checkdate(dia, mes, anio){
    var validformat = /^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
    var returnval = false;
     
    if(!validformat.test(input.value)){
        return false;
    }else{ //Detailed check for valid date ranges
        var monthfield = mes;
        var dayfield = dia;
        var yearfield = anio;
        var dayobj = new Date(yearfield, monthfield-1, dayfield);
        if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
            return false;
        }else{
            return true;
        }
    }
     
    return true;
}
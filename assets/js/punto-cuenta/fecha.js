function nuevoAjax(){ 
	var xmlhttp=false; 
	try 
	{ 
		// No IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 
	return xmlhttp; 
}
function Vfecha(){
	nuevoAjax();
	var fecha=document.getElementById('fecha').value;
	var validacion_fecha=document.getElementById("validacion_fecha");
	validacion_fecha.innerHTML=fecha;
	var n = fecha.search("/");
	if (n>0) {
		var elem = fecha.split('/');
		var sdia = elem[0];
		var smes = elem[1];
		var sanio = elem[2];
		var numdias = 0;
		var dd = parseInt(sdia);
		var mm = parseInt(smes);
		var yyyy = parseInt(sanio);
		if ((dd == 0) || (mm == 0) || (yyyy == 0))
		{
			validacion_fecha.innerHTML="FECHA INCORRECTA";
		}
		else
		{
			if ((mm == 1) || (mm == 3) || (mm == 5) || (mm == 7) || (mm == 8) || (mm == 10) || (mm == 12)) { numdias = 31; }
			if ((mm == 4) || (mm == 6) || (mm == 9) || (mm == 11)) { numdias = 30; }
			if (mm == 2) numdias = 29;
			if (dd > numdias)
			{
				validacion_fecha.innerHTML="FECHA INCORRECTA";
				}
			else
			{
				validacion_fecha.innerHTML="FECHA CORRECTA";
				}
		}
	}
	else {
		validacion_fecha.innerHTML="FECHA CORRECTA";
	}
}
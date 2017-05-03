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
		if ((dd == 0) || (mm == 0) || (yyyy == 0)||isNaN(sdia)||isNaN(smes)||isNaN(sanio))
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
			if (mm > 12){
				validacion_fecha.innerHTML="FECHA INCORRECTA";			
			}			
		}
	}
	else {
		validacion_fecha.innerHTML="FECHA INCORRECTA";
	}
}
function Vasunto(){
	nuevoAjax();
	var asunto=document.getElementById('asunto').value;
	asunto=asunto.toUpperCase();
	var validacion_asunto=document.getElementById("validacion_asunto");
	var n = asunto.length;
	if (n==0) {
		validacion_asunto.innerHTML="EL CAMPO NO PUEDE ESTAR VACIO";
	}
	else {
		document.getElementById('asunto').value=asunto;
		validacion_asunto.innerHTML="OK";		
	}	
}
function Vsintesis(){
	nuevoAjax();
	var sintesis=document.getElementById('sintesis').value;
	sintesis=sintesis.toUpperCase();
	var validacion_sintesis=document.getElementById("validacion_sintesis");
	var n = sintesis.length;
	if (n==0) {
		validacion_sintesis.innerHTML="EL CAMPO NO PUEDE ESTAR VACIO";
	}
	else {
		document.getElementById('sintesis').value=sintesis;
		validacion_sintesis.innerHTML="OK";	}
}
function Vconclusiones(){
	nuevoAjax();
	var conclusiones=document.getElementById('conclusiones').value;
	conclusiones=conclusiones.toUpperCase();
	var validacion_conclusiones=document.getElementById("validacion_conclusiones");
	var n = conclusiones.length;
	if (n==0) {
		validacion_conclusiones.innerHTML="EL CAMPO NO PUEDE ESTAR VACIO";
	}
	else {
		document.getElementById('conclusiones').value=conclusiones;
		validacion_conclusiones.innerHTML="OK";
	}
}
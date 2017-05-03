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
function Vmonto(){
	nuevoAjax();
	var n=0;
	var monto=document.getElementById('monto').value;
	var validacion_monto=document.getElementById("validacion_monto");
	if (isNaN(monto)) {
		if((monto.search(".")>0)||(monto.search(",")>0)){
			var res = monto.replace(".", "0");
			var res2 = res.replace(",", "0");
			if(isNaN(res2)){
				validacion_monto.innerHTML="EL CAMPO DEBE SER NUMERICO";
			}
			else {
				validacion_monto.innerHTML="OK";		
			}
		}
	}
	else {
		validacion_monto.innerHTML="OK";
	}
}
function Vasunto(){
	nuevoAjax();
	var asunto=document.getElementById('asunto').value;
	asunto=asunto.toUpperCase();
	var validacion_asunto=document.getElementById("validacion_asunto");
	var n = asunto.search("SOLICITUD DE RECURSOS FINANCIEROS PARA");
	if (n==0) {
		document.getElementById('asunto').value=asunto;
		validacion_asunto.innerHTML="OK";
	}
	else {
		validacion_asunto.innerHTML="EL ASUNTO DEBE COMENZAR CON: SOLICITUD DE RECURSOS FINANCIEROS PARA ";
	}
}
function Vargumentacion(){
	nuevoAjax();
	var monto=document.getElementById('monto').value;
	var argumentacion=document.getElementById('argumentacion').value;
	argumentacion=argumentacion.toUpperCase();
	var validacion_argumentacion=document.getElementById("validacion_argumentacion");
	var n = argumentacion.search(monto);
	if (n<0) {
		validacion_argumentacion.innerHTML="EL MONTO TOTAL DEBE ESTAR INCLUIDO EN LA ARGUMENTACION";
	}
	else {
		document.getElementById('argumentacion').value=argumentacion;
		validacion_argumentacion.innerHTML="OK";
	}
}
function Vpropuesta(){
	nuevoAjax();
	var propuesta=document.getElementById('propuesta').value;
	propuesta=propuesta.toUpperCase();
	var validacion_propuesta=document.getElementById("validacion_propuesta");
	var n = propuesta.search("APROBAR RECURSOS PARA ");
	if (n==0) {
		document.getElementById('propuesta').value=propuesta;
		validacion_propuesta.innerHTML="OK";
	}
	else {
		validacion_propuesta.innerHTML="LA PROPUESTA DEBE COMENZAR CON: APROBAR RECURSOS PARA ";
	}
}

                       

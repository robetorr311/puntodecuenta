					<?php
						if (empty($fecha)){	$fecha=""; }
						if (empty($para)){	$para=""; }
						if (empty($de)){	$de=""; }
						if (empty($cargopara)){	$cargopara=""; }
						if (empty($cargode)){	$cargode=""; }
						if (empty($asunto)){	$asunto=""; }
						if (empty($sintesis)){	$sintesis=""; }
						if (empty($conclusiones)){	$conclusiones=""; }
						$asunto="<p align=\"justify\">".$asunto."</p>";
						$conclusiones="<p align=\"justify\">".$conclusiones."</p>";
					?>
	<page backtop="59mm" backbottom="7mm" >
    <link href="<?php echo base_url(); ?>assets/css/punto-cuenta/Site.css" rel="stylesheet" type="text/css" />
	<page_header>
	<img src="<?php echo base_url(); ?>assets/img/punto-cuenta/tituloptodeinformacion.jpg" >
	<br><br>
	<table width="681" cellpadding="5" cellspacing="0" style="page-break-before: always">
		<col width="69">
		<col width="283">
		<col width="132">
		<col width="197">
			<tr valign="top" >
				<td rowspan="2" class="bordesupderizq" ><b>PARA:</b></td>
				<td rowspan="2" colspan="2"  class="bordesupizq"><?= $para; ?><br><br><?= $cargopara; ?></td>
				<td class="bordecompleto">Nº de Punto de Información</td>
			</tr>
			<tr valign="top">
                <!--<td class="bordederizq"></td><td class="bordeninguno"></td><td class="bordeninguno"></td>-->
				<td  class="bordecompleto"><?= $numero; ?></td>
			</tr>
			<tr>
				<td  class="bordesupderizq"><b>DE:</b></td>
				<td  class="bordesuperior"><?= $de; ?><br><br><?= $cargode; ?></td>
				<td class="bordesuperior"></td>
				<td class="bordesupderizq"><b>N° de Página: [[page_cu]]/[[page_nb]]</b></td>
			</tr>
			<tr valign="top">
				<td   class="bordecompleto">
					<B>FECHA:</B>
				</td>
				<td colspan="2" class="bordecompleto">
					<?= $fecha; ?>
				</td>
				<td class="bordeinfderizq">
					
				</td>
			</tr>
	</table>
	</page_header>
	<table width="696" cellpadding="5" cellspacing="0" style="page-break-before: always">
			<tr>
				<td width="696" class="fbordecompleto" >
					<b>ASUNTO:</b>
				</td>
			</tr>
			<tr>
				<td width="696" class="bordecompleto">
	               <?= $asunto; ?>
				</td>
			</tr>
			<tr>
				<td  width="696" valign="top"  class="fbordecompleto" >
					<b>SINTESIS:</b>
				</td>
			</tr>
			<tr>
				<td width="696" valign="top"  class="bordecompleto">
                    <?= $sintesis; ?>
				</td>
			</tr>
			<tr>
				<td  width="696" valign="top"  class="fbordecompleto" >
					<b>CONCLUSIONES Y/O RECOMENDACIONES:</b>
				</td>
			</tr>
			<tr>
				<td  width="696" valign="top"  class="bordecompleto">
					<?= $conclusiones; ?>
				</td>
			</tr>
	</table>
	<table width="690" cellpadding="5" cellspacing="0" style="page-break-before: always">
			<tr>
				<td  width="300" class="bordecompleto">
				<table>	
                    <tr>
                    	<td>Aprobado   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Negado   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Visto   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Diferido   <table><tr><td class="bordecuadro"></td></tr></table></td>
					</tr>
				</table>
				</td>
				<td width="390" class="fbordecompleto">
                    Firma y Sello del Secretario Sectorial del Poder Popular para la Salud
					del Estado Bolivariano de Aragua.
				</td>
			</tr>
	</table>
	<table width="690" cellpadding="5" cellspacing="0" style="page-break-before: always">
			<tr valign="top" class="bordecompleto">
				<td width="300"  class="bordecompleto">
                    <b>Otras		Instrucciones:</b><br><br><br><br><br>
				</td>
				<td  width="390" class="bordecompleto">

				</td>
			</tr>
	</table>		
	<table width="690" cellpadding="5" cellspacing="0" style="page-break-before: always">
			<tr valign="top">
				<td width="300"  class="bordecompleto">
					<br><br><b>PRESENTADO POR:</b>
					<br><br><br><br>
				</td>
				<td  width="390" class="bordecompleto"><br><br>
                    ANEXOS: 
				<table>	
                    <tr>
                    	<td>Si   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>No   <table><tr><td class="bordecuadro"></td></tr></table></td>
					</tr>
				</table>  <br><br>
            	</td>
			</tr>
	</table>
	</page>
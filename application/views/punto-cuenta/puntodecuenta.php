					<?php
						if (empty($fecha)){	$fecha=""; }
						if (empty($numero)){	$numero=""; }
						if (empty($presentante)){	$presentante=""; }
						if (empty($cargo)){	$cargo=""; }
						if (empty($asunto)){	$asunto=""; }
						if (empty($argumentacion)){	$argumentacion=""; }
						if (empty($propuesta)){	$propuesta=""; }
						$propuesta="<p align=\"justify\">".$propuesta."</p>";
						$asunto="<p align=\"justify\">".$asunto."</p>";
					?>
	<page backtop="50mm" backbottom="7mm" >
    <link href="<?php echo base_url(); ?>assets/css/punto-cuenta/Site.css" rel="stylesheet" type="text/css" />
	<page_header>
	<img src="<?php echo base_url(); ?>assets/img/punto-cuenta/tituloptodecuenta.jpg" >
	<br><br>
	<table width="700" cellpadding="5" cellspacing="0" style="page-break-before: always">
		<col width="10">
		<col width="90">
		<col width="10">
		<col width="350">
		<col width="10">
		<col width="120">
		<col width="10">
		<col width="100">
		<tr>
			<td class="bordeninguno"></td>
			<td class="bordecompleto"><b>No. <?= $numero; ?> </b></td>
			<td class="bordeninguno"></td>
			<td class="bordecompleto"><b>Presentante: <?= $presentante; ?></b><br><br><?= $cargo; ?> </td>
			<td class="bordeninguno"></td>
			<td class="bordecompleto"><b>Fecha: <?= $fecha; ?> </b></td>
			<td class="bordeninguno"></td>
			<td class="bordecompleto"><b>N° de Página: [[page_cu]]/[[page_nb]]</b></td>
		</tr>
	</table>	
	</page_header>
	<table width="700" cellpadding="5" cellspacing="0" style="page-break-before: always">
			<tr>
				<td width="700" class="fbordecompleto" >
					<b>ASUNTO:</b>
				</td>
			</tr>
			<tr>
				<td width="700" class="bordecompleto">
	               <?= $asunto; ?>
				</td>
			</tr>
			<tr>
				<td  width="700" valign="top"  class="fbordecompleto" >
					<b>ARGUMENTACION</b>
				</td>
			</tr>
			<tr>
				<td width="700" valign="top"  class="bordecompleto">
                    <?= $argumentacion; ?>
				</td>
			</tr>
			<tr>
				<td  width="700" valign="top"  class="fbordecompleto" >
					<b>PROPUESTA</b>
				</td>
			</tr>
			<tr>
				<td  width="700" valign="top"  class="bordecompleto">
					<?= $propuesta; ?>
				</td>
			</tr>
			<tr>
				<td  width="700" valign="top"  class="fbordecompleto" >
					<b>COMENTARIOS DEL CIUDADANO PRESIDENTE</b>
				</td>
			</tr>
			<tr>
				<td  width="700" valign="top"  class="bordecompleto">
					<br><br><br><br><br><br><br>
				</td>
			</tr>
	</table>
	<table width="690" cellpadding="5" cellspacing="0" style="page-break-before: always">
			<tr>
				<td  width="700" valign="top"  class="fbordecompleto" >
					<b>DECISION DEL CIUDADANO PRESIDENTE</b>
				</td>
			</tr>			
			<tr>
				<td align="center" width="700" class="bordecompleto">
				<table>	
                    <tr>
                    	<td>Aprobado   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Negado   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Visto   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Diferido   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>Otro   <table><tr><td class="bordecuadro"></td></tr></table></td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td  width="700" valign="top"  class="fbordecompleto" >
					<b>TRATAMIENTO COMUNICACIONAL PROPUESTO</b>
				</td>
			</tr>			
			<tr>
				<td align="center" width="700" class="bordecompleto">
				<table>	
                    <tr>
                    	<td>DIVULGACION PUBLICA   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>DIVULGACION DIFERIDA   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>NO DIVULGAR   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>TWITEAR   <table><tr><td class="bordecuadro"></td></tr></table></td>
                    	<td>INMEDIATA   <table><tr><td class="bordecuadro"></td></tr></table></td>
					</tr>
				</table>
				</td>
			</tr>
	</table>

	</page>
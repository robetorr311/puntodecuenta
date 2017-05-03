<div id="formulario">
			<form id="formulario" name="formulario" action="guardar_presentacion" method="post">
                <div class="box-header bg-aqua">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                    </div><!-- /. tools -->
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Presentacion de Punto de Cuenta
					</h3>
                </div>	
			<?php
			if (empty($fecha)){	$fecha=""; }
			if (empty($numero)){	$numero=""; }
			if (empty($presentante)){	$presentante=""; }
			if (empty($cargo)){	$cargo=""; }
			if (empty($asunto)){	$asunto=""; }
			if (empty($argumentacion)){	$argumentacion=""; }
			if (empty($propuesta)){	$propuesta=""; }
			if (empty($monto)){	$monto=""; }
			if (empty($comentarios)){	$comentarios=""; }
			if (empty($referencia)){	$referencia=""; }
			if (empty($hcentro)){	$hcentro=""; }
			$id=$registro[0];			
			$numero=rtrim($registro[1]);
			$fecha=$registro[2];
			$asunto=$registro[3];
			$argumentacion=$registro[4];
			$propuesta=$registro[5];
			$comentarios=$registro[6];
			$referencia=$registro[7];
			$presentante=$registro[8];
			$cargo=rtrim($registro[9]);
			$monto=rtrim($registro[10]);
			$hcentro=$registro[11];
			?>
	
			<input type="hidden" 	name="id" id="id" value="<? echo $id; ?>">
			<input type="hidden" 	name="hcentro" id="hcentro" value="<? echo $hcentro; ?>">
			<label for="fecha" class="control-label">Fecha:</label>
			<input type="text" 	name="fecha" id="fecha" value="<? echo $fecha; ?>" maxlength="12" size="12" placeholder ="dd/mm/yyyy" onChange="Vfecha();">
			<div id="validacion_fecha"></div>
			<label for="presentante">Presentante:</label>
			<input type="text" 	name="presentante" id="presentante"  maxlength="80" size="50" value="<? echo $presentante; ?>" class ="form-control" >
			<label for="cargo">Cargo:</label>
			<input type="text" 	name="cargo" id="cargo"  maxlength="80" size="50" value="<? echo $cargo; ?>" class ="form-control" >
			<label for="asunto" >Asunto:</label>
            <textarea id="asunto" name="asunto" rows="10" cols="80" placeholder="SOLICITUD DE RECURSOS FINANCIEROS PARA" class="form-control" onChange="Vasunto();"><?php echo $asunto; ?></textarea>
			<div id="validacion_asunto" class="validacion"></div>
			<label for="monto" >Monto:</label>
            <input type="text" id="monto" name="monto" rows="10" cols="80" class="form-control" onChange="Vmonto();" value="<? echo $monto; ?>" >
			<div id="validacion_monto"></div>
			<label for="argumentacion" >Argumentacion:</label>
			<textarea id="argumentacion" name="argumentacion" class="'form-control" rows="10" cols="80">
                <?php echo $argumentacion; ?>
            </textarea>
	         <script type="text/javascript">
	         	var editor=CKEDITOR.replace( 'argumentacion', {
				toolbar: [
					{ name: 'insert', items: [ 'Table' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
					[ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo','-', 'NumberedList', 'BulletedList' ],			// Defines toolbar group without name.
					'/',																					// Line break - next group will be placed in new line.
					{ name: 'basicstyles', items: [ 'Bold', 'Italic','Strike' ] }
				]
				});				
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
	            editor.on( 'change', function() {
				    // getData() returns CKEditor's HTML content.
						var arg=CKEDITOR.instances.argumentacion.getData();
						var mnt=$("#monto").val();
						var n=arg.search(mnt);
						if (n<0) {
							$("#validacion_argumentacion").innerHTML="EL MONTO TOTAL DEBE ESTAR INCLUIDO EN LA ARGUMENTACION";
						}
						else {
							$("#validacion_argumentacion").innerHTML="OK";
						}				    
				    //console.log( 'Total bytes: ' + evt.editor.getData().length );
				});    
        	</script> 		
			<div id="validacion_argumentacion"></div>
			<label for="propuesta" >Propuesta:</label>
            <textarea id="propuesta" name="propuesta" rows="10" cols="80" placeholder="SOLICITUD DE RECURSOS FINANCIEROS PARA" class="form-control" onChange="Vpropuesta();"><?php echo $propuesta; ?></textarea>
			<div id="validacion_propuesta"></div>

		<input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Actualizar">
</form>
</div>
<div id="formulario">
	<form id="formulario" name="formulario" action="guardar_informacion" method="post">
    <div class="col-xs-12">
			<div class="box">
		
                <div class="box-header bg-yellow">
                    <i class="fa fa-file-o"></i>
                    <h3 class="box-title">PUNTO DE INFORMACION
					</h3>
                </div>
            </div>
			<div class="box-body"> 
					<?php
					if (empty($numero)){	$numero=""; }
					if (empty($fecha)){	$fecha=""; }
					if (empty($asunto)){	$asunto=""; }
					if (empty($editor1)){	$editor1=""; }
					if (empty($conclusiones)){	$conclusiones=""; }
					if (empty($comentarios)){	$comentarios=""; }
					if (empty($para)){	$para=""; }
					if (empty($de)){	$de=""; }
					if (empty($cargopara)){	$cargopara=""; }
					if (empty($cargode)){	$cargode=""; }
					$id=$registro[0];
					$numero=$registro[1];
					$fecha=$registro[2];
					$asunto=$registro[3];
					$editor1=$registro[4];
					$conclusiones=$registro[5];
					$comentarios=$registro[6];
					$para=$registro[7];
					$de=$registro[8];
					$cargopara=$registro[9];
					$cargode=$registro[10];
					$hcentro=$registro[11];				
					?>
					<input type="hidden" 	name="id" id="id" value="<? echo $id; ?>">
					<input type="hidden" 	name="hcentro" id="hcentro" value="<? echo $hcentro; ?>">					
					<label for="fecha">Fecha:</label>
					<input type="text" 	name="fecha" id="fecha" value="<? echo $fecha; ?>" maxlength="12" size="12" placeholder ="dd/mm/yyyy" onChange="Vfecha();">
					<div id="validacion_fecha" class="validacion_fecha"></div>
					<label for="para">Para:</label>
					<input type="text" 	name="para" id="para"  maxlength="80" size="50" value="<? echo $para; ?>" class ="form-control" >
					<label for="name">Cargo:</label>
					<input type="text" 	name="cargopara" id="cargopara"  maxlength="250" size="50" value="<? echo $cargopara; ?>" class ="form-control" >
					<label for="de">De:</label>
					<input type="text" 	name="de" id="de"  maxlength="250" size="50" value="<? echo $de; ?>" class ="form-control" >
					<label for="cargode">Cargo:</label>
					<input type="text" 	name="cargode" id="cargode"  maxlength="250" size="50" value="<? echo $cargode; ?>" class ="form-control" >
					<label for="asunto" >Asunto:</label>
                    <textarea id="asunto" name="asunto" rows="10" cols="80" class="form-control" onChange="Vasunto();"><?php echo $asunto; ?></textarea>
					<div id="validacion_asunto" class="validacion"></div>
					<label for="editor1" >Sintesis:</label>
                    <textarea id="editor1" name="editor1" rows="10" cols="80"><?php echo $editor1; ?></textarea>
        			<script type="text/javascript">
			            $(function() {
			                // Replace the <textarea id="editor1"> with a CKEditor
			                // instance, using default configuration.
							CKEDITOR.replace( 'editor1', {
							toolbar: [
								{ name: 'insert', items: [ 'Table' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
								[ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo','-', 'NumberedList', 'BulletedList' ],			// Defines toolbar group without name.
								'/',																					// Line break - next group will be placed in new line.
								{ name: 'basicstyles', items: [ 'Bold', 'Italic','Strike' ] }
							]
							});
							CKEDITOR.on('dialogDefinition', function(ev) {
							    var dialogName = ev.data.name;
							    var dialogDefinition = ev.data.definition;

							    if (dialogName == 'table' || dialogName == 'tableProperties') {
							        var contents = dialogDefinition.getContents('info');
							        contents.remove('txtCaption');
							        contents.remove('txtSummary');
							    }
							});								
			                //bootstrap WYSIHTML5 - text editor
			                $(".textarea").wysihtml5();
			                CKEDITOR.config.disableNativeSpellChecker = true;
			            });
			        </script>                          
					<div id="validacion_sintesis" class="validacion"></div>
					<label for="conclusiones" >Conclusiones y Recomendaciones:</label>
                    <textarea id="conclusiones" name="conclusiones" rows="10" cols="80" class="form-control" onChange="Vconclusiones();"><?php echo $asunto; ?></textarea>
					<div id="validacion_conclusiones" class="validacion"></div>
					<input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Actualizar">
					</form>
			</div>
		</div>			
</div>        

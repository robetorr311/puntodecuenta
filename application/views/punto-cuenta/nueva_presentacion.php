        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>        
        <!-- CK Editor -->
        <script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/js/ckeditor/adapters/jquery.js" type="text/javascript"></script>
               
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />        

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/punto-cuenta/nueva_presentacion.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/punto-cuenta/puntocuenta.js"></script>
<section class="content">
<div id="formulario">
	<form id="formulario" name="formulario" action="guardar_presentacion" method="post">
   <div class="col-xs-12">
			<div class="box">
		
                <div class="box-header bg-aqua">
                    <i class="fa fa-file-o"></i>
                    <h3 class="box-title">PRESENTACION DE PUNTO DE CUENTA
					</h3>
                </div>
            </div>
			<div class="box-body">  
				<?php
				if (empty($fecha)){	$fecha=""; }
				if (empty($presentante)){	$presentante=""; }
				if (empty($cargo)){	$cargo=""; }
				if (empty($asunto)){	$asunto=""; }
				if (empty($argumentacion)){	$argumentacion=""; }
				if (empty($propuesta)){	$propuesta=""; }
				if (empty($monto)){	$monto=""; }
				if (empty($hcentro)){	$hcentro=""; }			
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
				<label class="control-label" >Argumentacion:</label>
				<textarea id="argumentacion" name="argumentacion" class="'form-control" rows="10" cols="80">
	                <?php echo $argumentacion; ?>
	            </textarea>
	            	<div id="validacion_argumentacion"></div>
		         <script type="text/javascript">
						CKEDITOR.on('instanceCreated', function (e) {
						    document.getElementById( 'validacion_' + e.editor.name ).innerHTML = e.editor.getData();
						    e.editor.on('change', function (ev) {
						    	var monto =document.getElementById('monto').value;
						    	var argu=ev.editor.getData();	    				    	
						    	var n = argu.search(monto);
								if (n<0) {
									document.getElementById( 'validacion_argumentacion').innerHTML = "EL MONTO TOTAL DEBE ESTAR INCLUIDO EN LA ARGUMENTACION";
									document.getElementById('guardar').disabled=true;
								}
								else {
									document.getElementById( 'validacion_argumentacion').innerHTML = "OK";
									document.getElementById('guardar').disabled=false;
								}					    	
						        //document.getElementById( 'validacion_argumentacion').innerHTML = ev.editor.getData() + monto;
						    	
						    });
						});
						var config = { extraPlugins: 'onchange',
						toolbar: [
							{ name: 'insert', items: [ 'Table' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
							[ 'Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo','-', 'NumberedList', 'BulletedList' ],			// Defines toolbar group without name.
							'/',																					// Line break - next group will be placed in new line.
							{ name: 'basicstyles', items: [ 'Bold', 'Italic','Strike' ] }]};
						CKEDITOR.replace('argumentacion', config);

						CKEDITOR.on('dialogDefinition', function(ev) {
					    var dialogName = ev.data.name;
					    var dialogDefinition = ev.data.definition;

					    if (dialogName == 'table' || dialogName == 'tableProperties') {
					        var contents = dialogDefinition.getContents('info');
					        contents.remove('txtCaption');
					        contents.remove('txtSummary');
					    }
					});	  

	        	</script> 

				<label for="propuesta" >Propuesta:</label>
	            <textarea id="propuesta" name="propuesta" rows="10" cols="80" placeholder="SOLICITUD DE RECURSOS FINANCIEROS PARA" class="form-control" onChange="Vpropuesta();"><?php echo $propuesta; ?></textarea>
				<div id="validacion_propuesta"></div>
				<input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Guardar">
			</div>		
	</div>


</form>
</div>
</section>

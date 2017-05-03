<section class="content">

    <div class="col-xs-12">
			<div class="box">
		
                <div class="box-header bg-aqua">
                    <i class="fa fa-file-o"></i>
                    <h3 class="box-title">PRESENTACION DE PUNTO DE CUENTA
					</h3>
                </div>
            </div>
			<div class="box-body"> 
				<form id="formulario" name="formulario" action="pdf_presentacion" method="post" target="blank">					
					<input type="hidden" 	name="id" id="id" value="<? echo $id; ?>">			 
					<label for="name">Para Generar el documento en formato (.pdf) haga click en Generar PDF
					</label>
					<input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Generar PDF">		
				</form>
				<br>
				<br>
			</div>
			<a href="<?php echo base_url(); ?>index.php/punto-cuenta/Presentacion" class="small-box-footer"><input type="button" name="ok" id="ok" class="btn btn-success" value="Finalizar"></a>			
</section>

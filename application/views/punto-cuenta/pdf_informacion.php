<section class="content">
		<?php
			$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario');
			echo form_open('Presentacion/inicio_presentacion',$attributes);
		?>

		<div class="Izquierda">
               <div class="box-header bg-yellow">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                    </div><!-- /. tools -->
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Presentacion de Punto de Informacion
					</h3>
                </div>		
			<div class="fila_columna">
				<div class="label_columna1">
					<label for="name">Para Generar el documento en formato (.pdf) haga click en 
					<?php 
						$atts = array('target'      => 'blank');

						echo anchor('news/local/123', 'Generar Punto de Cuenta', $atts);
					 
					?>
					</label>
				</div>
			<div>
			<div class="fila">
			<?php
				$generar = array(	'name'        => 'generar',
									'id'          => 'generar',
									'class'		=> 'btn btn-success',
									'value'		=> 'Finalizar');
	    
				echo form_submit($generar);
			?>	
			<a href="<?php echo base_url();?>index.php/Informacion"><button class="btn bg-aqua" value="Regresar"></button></a>
			<?php			
				echo form_close();
			?>
			</div>

		</div>			
        
		</form>
</section>
<section class="content">
		<?php
			$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario');
			echo form_open('punto-cuenta/Presentacion/inicio_presentacion',$attributes);
		?>

		<div class="Izquierda">
                <div class="box-header bg-aqua">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                    </div><!-- /. tools -->
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">Presentacion de Punto de Cuenta
					</h3>
                </div>	
			<div class="fila_columna">
				<div class="label_columna1">
					<label for="name">Para Generar el documento en formato (.pdf) haga click en 
					<?php 
						$atts = array('target'      => 'contenido');

						echo anchor('news/local/123', 'Generar Punto de Cuenta', $atts);
					 
					?>
					</label>
				</div>
			<?php
				$generar = array(	'name'        => 'generar',
									'id'          => 'generar',
									'class'		=> 'btn btn-success',
									'value'		=> 'Finalizar');
	    
				echo form_submit($generar);
				
			?>	
			<a href="<?php echo base_url();?>index.php/Presentacion"><button class="btn btn-info">Finalizar</button></a>
			<?php			
				echo form_close();
			?>
		
        
</section>
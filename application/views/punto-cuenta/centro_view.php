<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/punto-cuenta/centro.js"></script>
<section class="content">
<div id="formulario">
    <div class="col-xs-12">
				<?php 
						if (empty($nombre)){	$nombre=""; }
						if (empty($telefono)){	$telefono=""; }
						if (empty($correo)){	$correo=""; }
						if (empty($direccion)){	$direccion=""; }
				?>
		    <div class="box-header bg-red">
		                    <i class="fa fa-hospital-o"></i>
		                    <h3 class="box-title">Ingreso de centros y organismos
							</h3>
		    </div>	
			<div class="box-body">
				<form id="formulario" name="formulario" action="Centro/guardar_centro" method="post">					
						<label for="nombre">Nombre del Centro:</label>
						<input type="text" 	name="nombre" id="nombre"  maxlength="80" size="50" value="<? echo $nombre; ?>" class ="form-control" >
						<label for="telefono">Telefono del Centro:</label>
						<input type="text" 	name="telefono" id="telefono"  maxlength="80" size="50" value="<? echo $telefono; ?>" class ="form-control" >
						<label for="correo">Correo del Centro:</label>
						<input type="text" 	name="correo" id="correo"  maxlength="80" size="50" value="<? echo $correo; ?>" class ="form-control" >
						<label for="direccion" >Direccion:</label>
			            <textarea id="direccion" name="direccion" rows="10" cols="80"  class="form-control" ><?php echo $direccion; ?></textarea>
						<input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Guardar">
				</form>
			</div>
	</div>
</div>
</section>

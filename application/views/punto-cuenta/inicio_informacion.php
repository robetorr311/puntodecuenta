<section class="content">
		<?php
			//$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario');
			//echo form_open('punto-cuenta/Informacion/nueva_informacion',$attributes);
		?>
	<form id="formulario" name="formulario" action="Informacion/nueva_informacion" method="post">
    <div class="col-xs-12">
			<div class="box">
		
                <div class="box-header bg-yellow">
                    <i class="fa fa-file-o"></i>
                    <h3 class="box-title">PUNTO DE INFORMACION
					</h3>
                </div>
            </div>
			<div class="box-body">  				
					<label for="name">CENTRO DE SALUD U ORGANISMO PRESENTANTE:</label>
					<select name="hcentro" id="hcentro">
					<?php
						
						if ($husuario==1){
							for ($d=0; $d < count($salida); $d++){
								$id= "" .$salida[$d]['id']."";
								$nombre= "" .$salida[$d]['nombre']."";
								$s.="<option value=\"$id\">$nombre</option>";  
							}							
						}
						else {
							for ($d=0; $d < count($salida); $d++){
								$id= "" .$salida[$d]['hcentro']."";
								$nombre= "" .$salida[$d]['centro']."";
								$s.="<option value=\"$id\">$nombre</option>";  
							}
						}
						echo $s;
					?>						
					</select>
			<input type="submit" name="crear" id="crear" class="btn btn-success" value="Crear">
			</form>
			</div>

		</div>			
        
</section>

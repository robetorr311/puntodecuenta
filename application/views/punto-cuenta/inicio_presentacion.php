<section class="content">

	<form id="formulario" name="formulario" action="Presentacion/nueva_presentacion" method="post">
    <div class="col-xs-12">
			<div class="box">
		
                <div class="box-header bg-aqua">
                    <i class="fa fa-file-o"></i>
                    <h3 class="box-title">PRESENTACION DE PUNTO DE CUENTA
					</h3>
                </div>
            </div>
			<div class="box-body">            		
					<label class="control-label">CENTRO DE SALUD U ORGANISMO PRESENTANTE:</label>
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

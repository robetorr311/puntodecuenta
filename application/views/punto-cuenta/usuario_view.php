<section class="content">
	<form id="formulario" name="formulario" action="Usuarios/guardar" method="post">		
    <div class="col-xs-12">
			<div class="box">		
              <div class="box-header bg-purple">
                    <i class="fa fa-user"></i>
                    <h3 class="box-title">USUARIOS DEL SISTEMA DE PUNTO DE CUENTA
					</h3>
                </div>	
            </div>
			<div class="box-body">   
					<label for="husuario">SELECCIONE USUARIO:</label>
					<select name="husuario" id="husuario">
					<?php
						
						for ($du=0; $du < count($usuario); $du++){
							$vhusuario= "" .$usuario[$du]['id']."";
							$vusuario= "" .$usuario[$du]['nombre']."";
							$su.="<option value=\"$vhusuario\">$vusuario</option>";  
						}
						echo $su;
					?>						
					</select>
					<label for="hcentro">CENTRO DE SALUD U ORGANISMO PRESENTANTE:</label>
					<select name="hcentro" id="hcentro">
					<?php
						
						for ($dc=0; $dc < count($centro); $dc++){
							$vhcentro= "" .$centro[$dc]['id']."";
							$vcentro= "" .$centro[$dc]['nombre']."";
							$s.="<option value=\"$vhcentro\">$vcentro</option>";  
						}
						echo $s;
					?>						
					</select>
					<input type="submit" name="guardar" id="guardar" class="btn btn-success" value="Agregar">				
			</div>
		</form>
	</div>
</section>

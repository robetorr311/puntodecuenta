<section class="content">

    <div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<i class="ion ion-clipboard"></i>
					<h3 class="box-title">LISTADO CENTROS Y ORGANISMOS</h3>
				</div><!-- /.box-header -->
			</div>
            <div class="box-body">
					<div id="contenidolista">
					<?php
						if (empty($salida)){ $salida= $retorno[0];}
						if (empty($inicio)) { $inicio= $retorno[1]; }
						if (empty($s)){ $s= ""; }		
						$s.="<table><tr><td><span class=\"text\">NOMBRE</span></td><td><span class=\"text\">TELEFONO</span></td><td><span class=\"text\">CORREO</span></td></tr>";
						for ($d=0; $d < count($salida); $d++){
							$id= "" .$salida[$d]['id']."";
							$nombre= "" .$salida[$d]['nombre']."";
							$telefono="" .$salida[$d]['telefono']."";
							$correo="" .$salida[$d]['correo']."";
							$s.="<tr><td><span class=\"text\">$nombre</span></td><td><span class=\"text\">$telefono</span></td><td><span class=\"text\">$correo</span></td><td><div class=\"tools\"><i class=\"fa fa-edit\" onclick=\"registro('$id');\"></i><i class=\"fa fa-trash-o\" onclick=\"eliminar('$id');\"></i></div></td></tr>";  
						}	
						$s.="</table><div class=\"box-footer clearfix\">";
						$s.="<div class=\"pull-right\">";
						$s.="<input type=\"hidden\"id=\"inicio\" id=\"inicio\" value=\"$inicio\"/><button id=\"atras\" onclick=\"atras();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
						$s.="<button id=\"adelante\" onclick=\"adelante();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
						$s.="</div>";
						$s.="</div>";				
						echo $s;
					?>                                       				
					</div>
            </div><!-- /.box-body -->
        </div>
</section>

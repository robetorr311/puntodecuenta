<section class="content">

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">LISTADO PUNTOS DE CUENTA</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
					<div id="contenidolista">
					<?php
						if (empty($salida)){ $salida= $retorno[0];}
						if (empty($hcentro)){ $hcentro= "";}						
						if (empty($inicio)) { $inicio= $retorno[1]; }
						if (empty($s)){ $s= ""; }		
						$s.="<table><tr><td><span class=\"text\">NUMERO</span></td><td><span class=\"text\">FECHA</span></td><td><span class=\"text\">ASUNTO</span></td><td><span class=\"text\">PRESENTANTE</span></td></tr>";
						for ($d=0; $d < count($salida); $d++){
							$id= "" .$salida[$d]['id']."";
							$numero= "" .$salida[$d]['numero']."";
							$fecha="" .$salida[$d]['fecha']."";
							$asunto="" .$salida[$d]['asunto']."";
							$presentante="" .$salida[$d]['presentante']."";			
							$s.="<tr><td><span class=\"text\">$numero</span></td><td><span class=\"text\">$fecha</span></td><td><span class=\"text\">$asunto</span></td><td><span class=\"text\">$presentante</span></td><td><div class=\"tools\"><a><i class=\"fa fa-edit\" onclick=\"registro('$id');\"   style=\"cursor:pointer\" ></i></a><a><i class=\"fa fa-trash-o\"   style=\"cursor:pointer\" onclick=\"eliminar('$id');\"></i></a><a href=\"".base_url()."index.php/punto-cuenta/Presentacion/pdf_presentacion?id=$id\" target=\"blank\" style=\"text-decoration:none\"><i class=\"fa fa-print\"></i></a></div></td></tr>";  
						}	
						$s.="</table><div class=\"box-footer clearfix\">";
						$s.="<div class=\"pull-right\">";
						$s.="<input type=\"hidden\" id=\"centro\" value=\"$hcentro\" /><input type=\"hidden\"id=\"inicio\" id=\"inicio\" value=\"$inicio\"/><button id=\"atras\" onclick=\"atras();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
						$s.="<button id=\"adelante\" onclick=\"adelante();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
						$s.="</div>";
						$s.="</div>";				
						echo $s;
					?>
                                            				
					</div>
            </div><!-- /.box-body -->
        </div>
    </div>
</section>

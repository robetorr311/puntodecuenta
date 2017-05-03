					<div id="contenidolista">
					<?php
						if (empty($salida)){ $salida= $retorno[0];}
						if (empty($inicio)) { $inicio= $retorno[1]; }
						if (empty($s)){ $s= ""; }		
						$s.="<table><tr><td><span class=\"text\">NUMERO</span></td><td><span class=\"text\">FECHA</span></td><td><span class=\"text\">PARA</span></td><td><span class=\"text\">DE</span></td><td></td><span class=\"text\">ASUNTO</span></td><td><span class=\"text\">CONTROLES</span></td></tr>";
						for ($d=0; $d < count($salida); $d++){
							$id= "" .$salida[$d]['id']."";
							$numero= "" .$salida[$d]['numero']."";
							$fecha="" .$salida[$d]['fecha']."";
							$asunto="" .$salida[$d]['asunto']."";
							$para="" .$salida[$d]['para']."";
							$de="" .$salida[$d]['de']."";
							$s.="<tr><td><span class=\"text\">$numero</span></td><td><span class=\"text\">$fecha</span></td><td><span class=\"text\">$para</span></td><td><span class=\"text\">$de</span></td><td><span class=\"text\">$asunto</span></td><td><div class=\"tools\"><a><i class=\"fa fa-edit\"   style=\"cursor:pointer\" onclick=\"registro('$id');\"></i></a><a><i class=\"fa fa-trash-o\"   style=\"cursor:pointer\"  onclick=\"eliminar('$id');\"></i></a><a href=\"".base_url()."index.php/punto-cuenta/Informacion/pdf_informacion?id=$id\" target=\"blank\" text-decoration:none><i class=\"fa fa-print\"></i></a></div></td></tr>";  
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

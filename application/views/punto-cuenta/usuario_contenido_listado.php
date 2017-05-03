					<?php
						if (empty($salida)){ $salida= $retorno[0];}
						if (empty($inicio)) { $inicio= $retorno[1]; }
						if (empty($s)){ $s= ""; }		
						$s.="<table><tr><th>NOMBRE</th><th>CENTRO</th><th>CONTROLES</th></tr>";
						for ($d=0; $d < count($salida); $d++){
							$id= "" .$salida[$d]['id']."";
							$husuario= "" .$salida[$d]['husuario']."";
							$hcentro="" .$salida[$d]['hcentro']."";
							$usuario= "" .$salida[$d]['usuario']."";
							$centro="" .$salida[$d]['centro']."";
							
							$s.="<tr><td>$usuario</td><td>$centro</td><td><div class=\"tools\"><i class=\"fa fa-trash-o\" onclick=\"eliminar('$id');\"></i></div></td></tr>";  
						}	
						$s.="</table><div class=\"box-footer clearfix\">";
						$s.="<div class=\"pull-right\">";
						$s.="<input type=\"hidden\"id=\"inicio\" id=\"inicio\" value=\"$inicio\"/><button id=\"atras\" onclick=\"atras();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
						$s.="<button id=\"adelante\" onclick=\"adelante();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
						$s.="</div>";
						$s.="</div>";				
						echo $s;
					?>

										<?php
											if (empty($salidapto)){ $salidapto= $retornop[0];}
											if (empty($iniciopto)) { $iniciopto= $retornop[1]; }
											if (empty($sp)){ $sp= ""; }		
											$sp.="<table class=\"table table-bordered\"><tr><th>NUMERO</th><th>FECHA</th><th>PRESENTANTE</th><th>CONTROLES</th></tr>";
											for ($dp=0; $dp < count($salidapto); $dp++){
												$idpto= "" .$salidapto[$dp]['id']."";
												$numeropto= "" .$salidapto[$dp]['numero']."";
												$fechapto="" .$salidapto[$dp]['fecha']."";
												$asuntopto="" .$salidapto[$dp]['asunto']."";
												$presentantepto="" .$salidapto[$dp]['presentante']."";			
												$sp.="<tr><td>$numeropto</td><td>$fechapto</td><td>$presentantepto</td><td><div class=\"tools\"><a href=\"".base_url()."index.php/punto-cuenta/Presentacion/pdf_presentacion?id=$idpto\" target=\"blank\" text-decoration:none><i class=\"fa fa-print\"></i></a></div></td></tr>";  
											}	
											$sp.="</table><div class=\"box-footer clearfix\">";
											$sp.="<div class=\"pull-right\">";
											$sp.="<input type=\"hidden\"id=\"iniciop\" id=\"iniciop\" value=\"$iniciopto\"/><button id=\"atrasp\" onclick=\"atrasp();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
											$sp.="<button id=\"adelantep\" onclick=\"adelantep();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
											$sp.="</div>";
											$sp.="</div>";				
											echo $sp;
										?>														
								

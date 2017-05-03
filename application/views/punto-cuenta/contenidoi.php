										<?php
											if (empty($salidai)){ $salidai= $retornoi[0];}
											if (empty($inicioi)) { $inicioi= $retornoi[1]; }
											if (empty($si)){ $si= ""; }		
											$si.="<table class=\"table table-bordered\"><tr><th>NUMERO</th><th>FECHA</th><th>DE</th><th>CONTROLES</th></tr>";
											for ($di=0; $di < count($salidai); $di++){
												$idi= "" .$salidai[$di]['id']."";
												$numeroi= "" .$salidai[$di]['numero']."";
												$fechai="" .$salidai[$di]['fecha']."";
												$dei="" .$salidai[$di]['de']."";
												$si.="<tr><td>$numeroi</td><td>$fechai</td><td>$dei</td><td><div class=\"tools\"><a href=\"".base_url()."index.php/punto-cuenta/Informacion/pdf_informacion?id=$idi\" target=\"blank\" text-decoration:none><i class=\"fa fa-print\"></i></a></div></td></tr>";  
											}	
											$si.="</table><div class=\"box-footer clearfix\">";
											$si.="<div class=\"pull-right\">";
											$si.="<input type=\"hidden\"id=\"inicioi\" id=\"inicioi\" value=\"$inicioi\"/><button id=\"atrasi\" onclick=\"atrasi();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
											$si.="<button id=\"adelantei\" onclick=\"adelantei();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
											$si.="</div>";
											$si.="</div>";				
											echo $si;
										?>															
								

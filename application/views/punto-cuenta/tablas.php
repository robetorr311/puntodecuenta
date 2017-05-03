<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/punto-cuenta/tablas_contenido.js"></script>
<section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">PUNTOS DE CUENTA</h3>
                                </div><!-- /.box-header -->
									<div class="box-body">
										<div id="contenidopto">
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
										</div>										
									</div><!-- /.box-body -->
								</div><!-- /.box -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">PUNTOS DE INFORMACION</h3>
                                </div><!-- /.box-header -->
									<div class="box-body">
										<div id="contenidoinf">
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
										</div>										
									</div><!-- /.box-body -->
								</div><!-- /.box -->
                        </div><!-- /.col -->
             </div><!-- /.row -->
<section class="content">

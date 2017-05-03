<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                    </div><!-- /. tools -->
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">BIENVENIDO AL SISTEMA DE INFORMACION PARA GENERAR PUNTOS DE CUENTA Y PUNTOS DE INFORMACION</h3>
                </div>
				
                <div class="box-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
						<?php
							if (empty($boxpresentacion)) { $boxpresentacion=""; }
							if (empty($boxinformacion)) { $boxinformacion=""; }	
							if (empty($boxcentros)) { $boxcentros=""; }													
							$boxpresentacion.="<div class=\"col-lg-3 col-xs-6\">";
							$boxpresentacion.="<div class=\"small-box bg-aqua\"><div class=\"inner\"><h3></h3><p>PRESENTACION DE PUNTO DE CUENTA</p></div>";
							$boxpresentacion.="<div class=\"icon\"><i class=\"ion ion-ios7-pricetag-outline\"></i></div>";
							$boxpresentacion.="<a href=\"".base_url()."index.php/punto-cuenta/Presentacion\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";
							echo $boxpresentacion;
							$boxinformacion.="<div class=\"col-lg-3 col-xs-6\">";
							$boxinformacion.="<div class=\"small-box bg-yellow\"><div class=\"inner\"><h3></h3><p>PRESENTACION DE PUNTO DE INFORMACION</p></div>";
							$boxinformacion.="<div class=\"icon\"><i class=\"ion ion-ios7-pricetag-outline\"></i></div>";
							$boxinformacion.="<a href=\"".base_url()."index.php/punto-cuenta/Informacion\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";
							echo $boxinformacion;
							$boxcentros.="<div class=\"col-lg-3 col-xs-6\">";
							$boxcentros.="<div class=\"small-box bg-red\"><div class=\"inner\"><h3></h3><p>CENTROS Y ORGANISMOS ADSCRITOS</p></div>";
							$boxcentros.="<div class=\"icon\"><i class=\"ion ion-ios7-pricetag-outline\"></i></div>";
							$boxcentros.="<a href=\"".base_url()."index.php/punto-cuenta/Centro\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";
							if (empty($boxusuario)) { $boxusuario=""; }
							$boxusuario.="<div class=\"col-lg-3 col-xs-6\">";
							$boxusuario.="<div class=\"small-box bg-purple\"><div class=\"inner\"><h3></h3><p>USUARIOS<br><br></p></div>";
							$boxusuario.="<div class=\"icon\"><i class=\"ion ion-person-add\"></i></div>";
							$boxusuario.="<a href=\"".base_url()."index.php/punto-cuenta/Usuarios\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";
							if ($husuario==1){
								echo $boxusuario;												
								echo $boxcentros;
							}
							
														
                        ?>

                        <!--<div class="col-lg-3 col-xs-6">
                            <!-- small box 
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                    </h3>
                                    <p>
                                        PRESENTACION DE PUNTO DE INFORMACION
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-pricetag-outline"></i>
                                </div>
                                <a href="<?php //echo base_url();?>index.php/informacion" class="small-box-footer" class="small-box-footer">
                                    Click Aqui <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div> ./col 
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box 
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                    </h3>
                                    <p>
                                        CENTROS Y ORGANISMOS ADSCRITOS
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-briefcase-outline"></i>
                                </div>
                                <a href="<?php //echo base_url();?>index.php/centro" class="small-box-footer" class="small-box-footer">
                                    Click Aqui <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col 
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box 
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                    </h3>
                                    <p>
                                        USUARIOS
                                        <br>
                                        <br>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?php //echo base_url();?>index.php/usuarios" class="small-box-footer" class="small-box-footer">
                                    Click Aqui <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div> ./col -->

                    </div><!-- /.row -->

                </div><!-- /.box-body-->
			</div><!-- /.box -->
        </div><!-- /.col -->    
     </div>    

</section>

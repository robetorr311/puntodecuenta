<?php
class Presentacion extends MY_Controller {
   function index(){
        //if (!$this->validate_access())
        //    return;
		$this->load->model('punto-cuenta/Centro_model');
		$husuario= $this->session->userdata('usr_id');
		$data['husuario']=$husuario;
		if ($husuario==1){
			$data['salida']=$this->Centro_model->listado();	   
		}
		else {
			$data['salida']=$this->Centro_model->listado_usuarios($husuario);	   
		}
			$this->add_view('punto-cuenta/inicio_presentacion',$data);
			$this->render();			
	}
	function nueva_presentacion(){
        //if (!$this->validate_access())
        //    return;		
		$f=time();
		$anio= strftime("%y",$f);	
		$this->load->model('punto-cuenta/Presentacion_model');
   	    $data['id']=$this->Presentacion_model->iddoc();
		$data['anio']=$anio;
		$hcentro=$this->input->post('hcentro');		
		$data['hcentro']=$hcentro;
		$this->add_view('punto-cuenta/nueva_presentacion',$data);
		$data['retorno']=$this->Presentacion_model->listados(0,1,$hcentro);
		$this->add_view('punto-cuenta/listado_presentacion_view',$data);		
		$this->render();
	}
	function guardar_presentacion(){

		$argumentacion=$this->input->post('argumentacion');
		$monto=$this->input->post('monto');
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('presentante', 'Presentante', 'required|max_length[200]');
		$this->form_validation->set_rules('cargo', 'Cargo', 'required|max_length[250]');
		$this->form_validation->set_rules('fecha', 'Fecha', 'trim|callback_validar_fecha');
		$this->form_validation->set_rules('monto', 'Monto', 'required|callback_moneda');
		$this->form_validation->set_rules('asunto','Asunto','trim|callback_validar_asunto');
		$this->form_validation->set_rules('propuesta','Propuesta','trim|callback_validar_propuesta');
		if(($this->form_validation->run() === true)&&(strpos($argumentacion, $monto)!== false)){
			$id=$this->input->post('id');
			$fecha=$this->input->post('fecha');
			$presentante=$this->input->post('presentante');
			$cargo=$this->input->post('cargo');
			$asunto=$this->input->post('asunto');
			$argumentacion=$this->input->post('argumentacion');
			$argumentacion=strtoupper($argumentacion);
			$propuesta=$this->input->post('propuesta');
			$monto=$this->input->post('monto');
			$hcentro=$this->input->post('hcentro');
			$husuario= $this->session->userdata('usr_id');
			$data['id']=$id;
			$data['hcentro']=$hcentro;
			$this->load->model('punto-cuenta/Centro_model');					
			$this->load->model('punto-cuenta/Presentacion_model');
			$correlativo=$this->Centro_model->correlativo($hcentro);
			$nuevocorrelativo=$correlativo+1;
			$f=time();
			$anio= strftime("%y",$f);
			$numero= "01".$nuevocorrelativo."/".$anio;							
			$this->Presentacion_model->guardar($id,$numero,$fecha,$presentante,$asunto,$argumentacion,$propuesta,$cargo,$monto,$hcentro,$husuario);	
			$this->add_view('punto-cuenta/guardar_presentacion',$data);
			$this->render();
		}
		else {
			$f=time();
			$anio= strftime("%y",$f);	
			$id=$this->input->post('id');
			$numero=$this->input->post('numero');
			$fecha=$this->input->post('fecha');
			$monto=$this->input->post('monto');
			$cargo=$this->input->post('cargo');
			$presentante=$this->input->post('presentante');
			$asunto=$this->input->post('asunto');
			$argumentacion=$this->input->post('argumentacion');
			$propuesta=$this->input->post('propuesta');	
			$hcentro=$this->input->post('hcentro');			
			$data['id']=$id;
			$data['hcentro']=$hcentro;			
			$data['fecha']=$fecha;
			$data['presentante']=$presentante;			
			$data['asunto']=$asunto;
			$data['argumentacion']=$argumentacion;			
			$data['propuesta']=$propuesta;
			$data['monto']=$monto;
			$data['cargo']=$cargo;
			$data['anio']=$anio;
			$this->add_view('punto-cuenta/nueva_presentacion',$data);
			$this->render();
			
		}

	}
	function completar_presentacion(){
		$f=time();
		$anio= strftime("%y",$f);	
		$this->load->model('punto-cuenta/Presentacion_model');
   	    $data['id']=$this->Presentacion_model->iddoc();
		$data['anio']=$anio;
		
		$this->add_view('punto-cuenta/nueva_presentacion',$data);
		$this->render();
	}	
	function eliminar(){
			$id=$this->input->post('id');
			$inicio=$this->input->post('inicio');
			$hcentro=$this->input->post('hcentro');
			$this->load->model('punto-cuenta/Presentacion_model');
			$data['hcentro']=$hcentro;
			$this->Presentacion_model->eliminar($id);
			$data['retorno']=$this->Presentacion_model->listados(0,1,$hcentro);
			$this->load->view('punto-cuenta/presentacion_contenido_listado',$data);
	}
	function adelante(){
			$inicio=$this->input->post('inicio');
			$hcentro=$this->input->post('hcentro');
			$this->load->model('punto-cuenta/Presentacion_model');
			$data['hcentro']=$hcentro;
			$data['retorno']=$this->Presentacion_model->listados($inicio,1,$hcentro);
			$this->load->view('punto-cuenta/presentacion_contenido_listado',$data);
	}
	function atras(){
			$inicio=$this->input->post('inicio');
			$hcentro=$this->input->post('hcentro');
			$this->load->model('punto-cuenta/Presentacion_model');
			$data['hcentro']=$hcentro;
			$data['retorno']=$this->Presentacion_model->listados($inicio,0,$hcentro);
			$this->load->view('punto-cuenta/presentacion_contenido_listado',$data);
	}	
	function registro(){
		$id=$this->input->post('id');	   
		$this->load->model('punto-cuenta/Presentacion_model');
   	    $data['registro']=$this->Presentacion_model->registro($id);
		$this->load->view('punto-cuenta/edit_presentacion',$data);
	}
    public function pdf_presentacion()
    {
        $this->load->model('punto-cuenta/Presentacion_model');		
        $this->load->library('html2pdf');
   		$id=$this->input->post('id');
   		if (empty($id)) { $id=$this->input->get('id'); }
		$datos=$this->Presentacion_model->puntodecuenta($id)->row();
		$numero=$datos->numero;
		$fecha=$datos->fecha;
		$presentante=$datos->presentante;
		$cargo=$datos->cargo;
		$asunto=$datos->asunto;
		$argumentacion=$datos->argumentacion;
		$propuesta=$datos->propuesta;     		
        $data = array(
            'numero' => $numero,
            'fecha' => $fecha,
            'presentante' => $presentante,
            'cargo' => $cargo,
            'asunto' => $asunto,
            'argumentacion' => $argumentacion,
            'propuesta' => $propuesta      
        );

    	
   		$html=$this->load->view('punto-cuenta/puntodecuenta', $data, true);
		$html2pdf= new HTML2PDF();  
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('puntodecuenta.pdf');      
        	
	}
	function validar_asunto ($asunto){
		$findme   = 'SOLICITUD DE RECURSOS FINANCIEROS PARA';
		$pos = strpos($asunto, $findme);
		if ($pos !== false) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validar_asunto', 'EL ASUNTO DEBE COMENZAR CON: SOLICITUD DE RECURSOS FINANCIEROS PARA "');		
			return false;
		}	
	}
	function validar_propuesta ($propuesta){
		$findme   = 'APROBAR RECURSOS PARA';
		$pos = strpos($propuesta, $findme);
		if ($pos !== false) {
			return true;
		} 
		else {
			$this->form_validation->set_message('validar_propuesta', 'LA PROPUESTA DEBE COMENZAR CON: APROBAR RECURSOS PARA "');		
			return false;
		}	
	}	
	function validar_argumentacion ($monto,$argumentacion){
		$pos = strpos($argumentacion, $monto);
		if ($pos !== false) {
			return true;
		} 
		else {
			return false;
		}	
	}
	function validar_fecha($fecha){
		$n=strlen($fecha);
		if ($n==10){
			$n = substr_count($fecha, '/');
			if ($n==2) {
				$elem = explode ('/',$fecha);
				$dd = $elem[0];
				$mm = $elem[1];
				$yyyy = $elem[2];
				if (($dd == 0) || ($mm == 0) || ($yyyy == 0)||(!is_numeric($dd))||(!is_numeric($mm))||(!is_numeric($yyyy)))
				{
					return false;
				}
				else
				{
					if (($mm == 1) || ($mm == 3) || ($mm == 5) || ($mm == 7) || ($mm == 8) || ($mm == 10) || ($mm == 12)) {
						if ($dd<= 31){
							return true;
						}
						else {
							return false;
						}
					}
					if (($mm == 4) || ($mm == 6) || ($mm == 9) || ($mm == 11)) {
						if ($dd<= 30){
							return true;
						}
						else {
							return false;
						}
					}
					if ($mm == 2) {
						if (($yyyy==2004)||($yyyy==2006)||($yyyy==2008)||($yyyy==2012)||($yyyy==2016)||($yyyy==2020)||($yyyy==2024)||($yyyy==2028)||($yyyy==2032)){
							if ($dd<= 29){
								return true;
							}
							else {
								return false;
							}						
						}
						else {
							if ($dd<= 28){
								return true;
							}
							else {
								return false;
							}						
						}
					}
					if ($mm>12){
						return false;
					}					
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	function moneda ($param) {
		if((is_int($param)) || (is_float($param))){
		  return false;
		} 
		else {
		  return true;
		}
	}	
}
?>

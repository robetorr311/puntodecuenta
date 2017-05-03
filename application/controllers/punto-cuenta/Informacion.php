<?php
class Informacion extends MY_Controller {
   function index(){
		$this->load->model('punto-cuenta/Centro_model');
		$husuario= $this->session->userdata('usr_id');
		$data['husuario']=$husuario;
		if ($husuario==1){
			$this->load->model('punto-cuenta/Centro_model');
			$data['salida']=$this->Centro_model->listado();	   
			$this->add_view('punto-cuenta/inicio_informacion',$data);
			$this->render();		
		}
		else {
			$data['salida']=$this->Centro_model->listado_usuarios($husuario);	   
			$this->add_view('punto-cuenta/inicio_informacion',$data);
			$this->render();
		}	   
	}
	function nueva_informacion(){
		$hcentro=$this->input->post('hcentro');	
		$f=time();
		$anio= strftime("%y",$f);	
		$this->load->model('punto-cuenta/Informacion_model');
   	    $data['id']=$this->Informacion_model->iddoc();
		$data['anio']=$anio;	
		$data['hcentro']=$hcentro;
		$this->add_view('punto-cuenta/nueva_informacion',$data);
		$data['retorno']=$this->Informacion_model->listados(0,1,$hcentro);
		$this->add_view('punto-cuenta/listado_informacion_view',$data);		
		$this->render();
	}
	function adelante(){
			$inicio=$this->input->post('inicio');
			$hcentro=$this->input->post('hcentro');
			$this->load->model('punto-cuenta/Informacion_model');
			$data['hcentro']=$hcentro;
			$data['retorno']=$this->Informacion_model->listados($inicio,1,$hcentro);
			$this->load->view('punto-cuenta/informacion_contenido_listado',$data);
	}
	function eliminar(){
			$id=$this->input->post('id');
			$inicio=$this->input->post('inicio');
			$hcentro=$this->input->post('hcentro');
			$this->load->model('punto-cuenta/Informacion_model');
			$data['hcentro']=$hcentro;
			$this->Informacion_model->eliminar($id);
			$data['retorno']=$this->Informacion_model->listados(0,1,$hcentro);
			$this->load->view('punto-cuenta/informacion_contenido_listado',$data);
	}
	function atras(){
			$inicio=$this->input->post('inicio');
			$hcentro=$this->input->post('hcentro');
			$this->load->model('punto-cuenta/Informacion_model');
			$data['hcentro']=$hcentro;
			$data['retorno']=$this->Informacion_model->listados($inicio,0,$hcentro);
			$this->load->view('punto-cuenta/informacion_contenido_listado',$data);
	}	
	function registro(){
		$id=$this->input->post('id');	   
		$this->load->model('punto-cuenta/Informacion_model');
   	    $data['registro']=$this->Informacion_model->registro($id);
		$this->load->view('punto-cuenta/edit_informacion',$data);
	}
		
	function guardar_Informacion(){

		$this->load->library('form_validation');	
		$this->form_validation->set_rules('fecha', 'Fecha', 'trim|callback_validar_fecha');
		$this->form_validation->set_rules('de','De','required|max_length[200]');
		$this->form_validation->set_rules('para','Para','required|max_length[200]');
		$this->form_validation->set_rules('cargopara', 'Cargopara', 'required|max_length[250]');
		$this->form_validation->set_rules('cargode', 'Cargode', 'required|max_length[250]');
		$this->form_validation->set_rules('asunto','Asunto','required');
		$this->form_validation->set_rules('editor1','Editor1','required');
		$this->form_validation->set_rules('conclusiones','Conclusiones','required');
		if($this->form_validation->run() === true){
			$id=$this->input->post('id');
			$hcentro=$this->input->post('hcentro');
			$fecha=$this->input->post('fecha');
			$de=$this->input->post('de');
			$para=$this->input->post('para');
			$cargode=$this->input->post('cargode');
			$cargopara=$this->input->post('cargopara');
			$asunto=$this->input->post('asunto');
			$sintesis=$this->input->post('editor1');
			$sintesis=strtoupper($sintesis);
			$conclusiones=$this->input->post('conclusiones');
			$husuario= $this->session->userdata('usr_id');			
			$data['id']=$id;
			$data['hcentro']=$hcentro;
			$this->load->model('punto-cuenta/Centro_model');					
			$this->load->model('punto-cuenta/Informacion_model');
			$correlativo=$this->Centro_model->correlativo_inf($hcentro);
			$nuevocorrelativo=$correlativo+1;
			$f=time();
			$anio= strftime("%y",$f);
			$numero= "02".$nuevocorrelativo."/".$anio;					
			$this->Informacion_model->guardar($id,$numero,$fecha,$para,$de,$cargopara,$cargode,$asunto,$sintesis,$conclusiones,$hcentro,$husuario);	
			$this->add_view('punto-cuenta/guardar_informacion',$data);
			$this->render();
		}
		else {
			$f=time();
			$anio= strftime("%y",$f);	
			$id=$this->input->post('id');
			$numero=$this->input->post('numero');
			$fecha=$this->input->post('fecha');
			$de=$this->input->post('de');
			$para=$this->input->post('para');
			$cargode=$this->input->post('cargode');
			$cargopara=$this->input->post('cargopara');
			$asunto=$this->input->post('asunto');
			$editor1=$this->input->post('editor1');
			$conclusiones=$this->input->post('conclusiones');	
			$data['id']=$id;
			$data['numero']=$numero;
			$data['fecha']=$fecha;
			$data['de']=$de;
			$data['para']=$para;
			$data['cargode']=$cargode;
			$data['cargopara']=$cargopara;
			$data['asunto']=$asunto;
			$data['editor1']=$editor1;
			$data['conclusiones']=$conclusiones;
			$data['anio']=$anio;
			$this->add_view('punto-cuenta/nueva_informacion',$data);
			$this->render();
			
		}

	}
	function completar_Informacion(){
		$f=time();
		$anio= strftime("%y",$f);	
		$this->load->model('punto-cuenta/Informacion_model');
   	    $data['id']=$this->Informacion_model->iddoc();
		$data['anio']=$anio;
		
		$this->add_view('punto-cuenta/nueva_Informacion',$data);
		$this->render();
	}
    public function pdf_informacion()
    {
        $this->load->model('punto-cuenta/Informacion_model');		
        $this->load->library('html2pdf');
   		$id=$this->input->post('id');
		if (empty($id)) { $id=$this->input->get('id'); }
		$datos=$this->Informacion_model->puntodeinformacion($id)->row();
		$numero=$datos->numero;
		$fecha=$datos->fecha;
		$de=$datos->de;
		$para=$datos->para;
		$cargode=$datos->cargode;
		$cargopara=$datos->cargopara;
		$asunto=$datos->asunto;
		$sintesis=$datos->sintesis;
		$conclusiones=$datos->conclusiones;
		if(empty($html)) { $html=""; }        		
        $data = array(
            'numero' => $numero,
            'fecha' => $fecha,
            'de' => $de,
            'para' => $para,
            'cargode' => $cargode,
            'cargopara' => $cargopara,
            'asunto' => $asunto,
            'sintesis' => $sintesis,
            'conclusiones' => $conclusiones       
        );

    	
   		$html=$this->load->view('punto-cuenta/puntodeinformacion', $data, true);
		$html2pdf= new HTML2PDF();  
        $html2pdf->WriteHTML($html);
        $html2pdf->Output('informacion.pdf');      
        	
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
}
?>

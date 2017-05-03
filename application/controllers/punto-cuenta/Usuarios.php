<?php
class Usuarios extends MY_Controller {
   function index(){
		$this->load->model('punto-cuenta/Usuarios_model');	   
		$this->load->model('punto-cuenta/Centro_model');
   	    $data['usuario']=$this->Usuarios_model->listado();	   
   	    $data['centro']=$this->Centro_model->listado();	   
		$this->add_view('punto-cuenta/usuario_view',$data);
		$data['retorno']=$this->Usuarios_model->listados(0,1);
		$this->add_view('punto-cuenta/listado_usuario_view',$data);			
		$this->render();
	}
	function guardar(){
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('hcentro', 'Hcentro', 'required|callback_centro');
		$this->form_validation->set_rules('husuario', 'Husuario', 'required|callback_husuario');
		if($this->form_validation->run() === true){
			$husuario=$this->input->post('husuario');
			$hcentro=$this->input->post('hcentro');
			$data['husuario']=$husuario;
			$data['hcentro']=$hcentro;
			$this->load->model('punto-cuenta/Usuarios_model');							
			$this->Usuarios_model->guardar($husuario,$hcentro);	
			$this->add_view('punto-cuenta/guardar_usuario',$data);
			$this->render();
		}
		else {
			redirect('usuarios');	
		}

	}
	function eliminar(){
			$id=$this->input->post('id');		
			$inicio=$this->input->post('inicio');
			$this->load->model('punto-cuenta/Usuarios_model');
			$this->Usuarios_model->eliminar($id);			
			$data['retorno']=$this->Usuarios_model->listados(0,1);
			$this->load->view('punto-cuenta/usuario_contenido_listado',$data);
	}	
	function adelante(){
			$inicio=$this->input->post('inicio');
			$this->load->model('punto-cuenta/Usuarios_model');
			$data['retorno']=$this->Usuarios_model->listados($inicio,1);
			$this->load->view('punto-cuenta/usuario_contenido_listado',$data);
	}
	function atras(){
			$inicio=$this->input->post('inicio');
			$this->load->model('punto-cuenta/Usuarios_model');
			$data['retorno']=$this->Usuarios_model->listados($inicio,0);
			$this->load->view('punto-cuenta/usuario_contenido_listado',$data);
	}	


	function centro ($asunto){
		if (empty($asunto)) {
			return false;
		} 
		else {
			return true;
		}	
	}
	function usuario ($asunto){
		if (empty($asunto)) {
			return false;
		} 
		else {
			return true;
		}	
	}	

}
?>

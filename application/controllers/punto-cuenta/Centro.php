<?php
class Centro extends MY_Controller {
	function index(){
	   		$this->add_view('punto-cuenta/centro_view');
			$this->load->model('punto-cuenta/Centro_model');
			$data['retorno']=$this->Centro_model->listados_centro(0,1);
			$this->add_view('punto-cuenta/listado_centros_view',$data);
			$this->render();
	}
	function eliminar(){
			$id=$this->input->post('id');
			$inicio=$this->input->post('inicio');
			$this->load->model('punto-cuenta/Centro_model');
			$this->Centro_model->eliminar($id);
			$data['retorno']=$this->Centro_model->listados_centro($inicio,1);
			$this->load->view('punto-cuenta/centro_contenido_listado',$data);
	}	
	function adelante(){
			$inicio=$this->input->post('inicio');
			$this->load->model('punto-cuenta/Centro_model');
			$data['retorno']=$this->Centro_model->listados_centro($inicio,1);
			$this->load->view('punto-cuenta/centro_contenido_listado',$data);
	}
	function atras(){
			$inicio=$this->input->post('inicio');
			$this->load->model('punto-cuenta/Centro_model');
			$data['retorno']=$this->Centro_model->listados_centro($inicio,0);
			$this->load->view('punto-cuenta/centro_contenido_listado',$data);
	}	
	function registro(){
		$id=$this->input->post('id');	   
		$this->load->model('punto-cuenta/Centro_model');
   	    $data['registro']=$this->Centro_model->registro($id);
		$this->load->view('punto-cuenta/centro_edit_view',$data);
	}
	function actualizar_Centro(){
		$this->load->model('punto-cuenta/Centro_model');
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('telefono','Telefono','required|max_length[20]');
		$this->form_validation->set_rules('correo','Correo','required|max_length[30]');
		if($this->form_validation->run() === true){
			$id=$this->input->post('id');			
			$nombre=$this->input->post('nombre');
			$telefono=$this->input->post('telefono');
			$correo=$this->input->post('correo');
			$direccion=$this->input->post('direccion');
			$this->Centro_model->actualizar($id,$nombre, $telefono , $correo , $direccion );	
			$this->add_view('punto-cuenta/guardar_centro');
			$this->render();
		}
		else {
			$nombre=$this->input->post('nombre');
			$telefono=$this->input->post('telefono');
			$correo=$this->input->post('correo');
			$direccion=$this->input->post('direccion');
			$data['nombre']=$nombre;
			$data['telefono']=$telefono;
			$data['correo']=$correo;
			$data['direccion']=$direccion;
			$this->add_view('punto-cuenta/centro_view',$data);
			$data['retorno']=$this->Centro_model->listados_centro(0,1);
			$this->add_view('punto-cuenta/listado_centros_view',$data);			
			$this->render();
			
		}
	}
	function guardar_Centro(){
		$this->load->model('punto-cuenta/Centro_model');
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('telefono','Telefono','required|max_length[20]');
		$this->form_validation->set_rules('correo','Correo','required|max_length[30]');
		if($this->form_validation->run() === true){
			$nombre=$this->input->post('nombre');
			$telefono=$this->input->post('telefono');
			$correo=$this->input->post('correo');
			$direccion=$this->input->post('direccion');
			$this->Centro_model->guardar($nombre, $telefono , $correo , $direccion );	
			$this->add_view('punto-cuenta/guardar_centro');
			$this->render();
		}
		else {
			$nombre=$this->input->post('nombre');
			$telefono=$this->input->post('telefono');
			$correo=$this->input->post('correo');
			$direccion=$this->input->post('direccion');
			$data['nombre']=$nombre;
			$data['telefono']=$telefono;
			$data['correo']=$correo;
			$data['direccion']=$direccion;
			$this->add_view('punto-cuenta/centro_view',$data);
			$data['retorno']=$this->Centro_model->listados_centro(0,1);
			$this->add_view('punto-cuenta/listado_centros_view',$data);			
			$this->render();
			
		}
	}
}
?>

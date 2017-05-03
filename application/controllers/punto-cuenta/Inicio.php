<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends MY_Controller {

   public function __construct() {
        parent:: __construct();
    }

    public function index() 
	{
		$husuario= $this->session->userdata('usr_id');
		$data['husuario']=$husuario;
		$this->add_view("punto-cuenta/contenido",$data);
		$this->load->model('punto-cuenta/Presentacion_model');
		$this->load->model('punto-cuenta/Informacion_model');
		if ($husuario==1){		
			$data['retornop']=$this->Presentacion_model->contenido(0,1);
			$data['retornoi']=$this->Informacion_model->contenido(0,1);			
		}
		else {
			$data['retornop']=$this->Presentacion_model->contenido_usuario(0,1,$husuario);
			$data['retornoi']=$this->Informacion_model->contenido_usuario(0,1,$husuario);			
		}
		$this->add_view("punto-cuenta/tablas",$data);		
		$this->render();
    }
 	function adelantei(){
		$husuario= $this->session->userdata('usr_id');
		$inicio=$this->input->post('inicio');
		$this->load->model('punto-cuenta/Informacion_model');
		if ($husuario==1){		
			$data['retornoi']=$this->Informacion_model->contenido($inicio,1);
		}
		else {
			$data['retornoi']=$this->Informacion_model->contenido_usuario($inicio,1,$husuario);
		}
		$this->load->view('punto-cuenta/contenidoi',$data);
	}
	function atrasi(){
		$inicio=$this->input->post('inicio');
		$this->load->model('punto-cuenta/Informacion_model');
		$husuario= $this->session->userdata('usr_id');		
		if ($husuario==1){		
			$data['retornoi']=$this->Informacion_model->contenido($inicio,0);
		}
		else {
			$data['retornoi']=$this->Informacion_model->contenido_usuario($inicio,0,$husuario);
		}
		$this->load->view('punto-cuenta/contenidoi',$data);
	}
 	function adelantep(){
		$inicio=$this->input->post('inicio');
		$this->load->model('punto-cuenta/Presentacion_model');
		$husuario= $this->session->userdata('usr_id');		
		if ($husuario==1){		
			$data['retornop']=$this->Presentacion_model->contenido($inicio,1);
		}
		else {
			$data['retornop']=$this->Presentacion_model->contenido_usuario($inicio,1,$husuario);
		}
		$this->load->view('punto-cuenta/contenidop',$data);
	}
	function atrasp(){
		$inicio=$this->input->post('inicio');
		$this->load->model('punto-cuenta/Presentacion_model');
		$husuario= $this->session->userdata('usr_id');		
		if ($husuario==1){		
			$data['retornop']=$this->Presentacion_model->contenido($inicio,1);
		}
		else {
			$data['retornop']=$this->Presentacion_model->contenido_usuario($inicio,1,$husuario);
		}
		$this->load->view('punto-cuenta/contenidop',$data);
	}		   
}

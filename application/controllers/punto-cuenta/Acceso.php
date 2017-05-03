<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Acceso extends MY_Controller {

   public function __construct() {
        parent:: __construct();
        $this->load->model('punto-cuenta/Inicio_model');
        
    }
    
    
    public function index() 
	{
	   	$usu = $this->session->userdata('usuario');
		$this->add_view("punto-cuenta/Acceso",'', "main");
		$this->render($usu,"Sigesmed");
		
    }
	
	
}

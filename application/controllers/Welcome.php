<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function pepe()
	{
		$this->load->view('welcome_message');
	}


	public function index(){
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]');
    	$this->form_validation->set_rules('sueldo', 'Sueldo', 'required|numeric');

    	if($this->form_validation->run() === true){
        //Si la validación es correcta, cogemos los datos de la variable POST
        //y los enviamos al modelo
        $nombre = $this->input->post('nombre');
        $sueldo = $this->input->post('sueldo');
           
        $this->load->model('empleados_model');
        $this->empleados_model->insertar_empleado($nombre, $sueldo);
    	}
    	$this->load->view("create");
	}




}

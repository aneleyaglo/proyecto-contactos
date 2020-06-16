<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//cargando el form
		$this->load->helper('form');
		//cargando el helper url para poder redireccionar
		$this->load->helper('url');
		//inicializando la validacion
		$this->load->library('form_validation');
		//cargando el modelo Contactos
		$this->load->model('Contactos_model');
	}
	
	public function rules()
	{
		//validando el email sea requerido
		$this->form_validation->set_rules('c_email','Correo Electronico','required|valid_email');
		$this->form_validation->set_rules('c_nombre','Nombre','required|min_length[3]');
		$this->form_validation->set_rules('c_edad','Edad','required|integer');
		// se usa trim para validar campos que no nos afectan
		$this->form_validation->set_rules('c_telefono','Telefono','trim');
		$this->form_validation->set_rules('c_status','Estatus','trim');
	}
	
	public function index()
	{

		$data['listado'] = $this->Contactos_model->get_todos();

		$this->load->view('view_list_contactos',$data);
	}

	public function agregar()
	{

		if ($this->input->post()) {
			//llamanda a las reglas creadas arribas
			$this->rules();
			//corriendo la validacion , sino no funciona	$this->form_validation->run()
			if ($this->form_validation->run() == TRUE) {

				//invocando a la funcion add del modelo Contactos
				$id_insertado = $this->Contactos_model->add();

				echo "el ID insertado es:  ". $id_insertado;
				//print_r($this->input->post());

			} else {

				$this->load->view('view_form_contactos');
			}


		} else {

			$this->load->view('view_form_contactos');
		}
	}

	public function modificar($id = NULL)
	{

		if ($id == NULL or !is_numeric($id)) {
			 //validando que sea numerico y no nulo
			echo 'error en el  ID';
			return;
		}

		if ($this->input->post()) {
			//llamanda a las reglas creadas arribas
			$this->rules();
		
			if ($this->form_validation->run() == TRUE) {
				$this->Contactos_model->edit($id);
				redirect('contactos'); //redirecciona a otro modulo, otro controlador

			} else {
				$this->load->view('view_form_contactos');
			}

		} else {

			$data['datos_contactos'] = $this->Contactos_model->get_by_id($id);

			if (empty($data['datos_contactos'])) {
				echo 'ID invalido o Contacto no existe';
			} else {
				//	print_r($data['datos_contactos']);
				//pasando datos a la vista
				$this->load->view('view_form_contactos',$data);
			}

		}
	}
	
	public function eliminar($id = NULL)
	{
		if ($id == NULL or !is_numeric($id)) {
			echo 'error en el  ID';
			return;
		}

		
		if ($this->input->post()) {
			$id_eliminar = 	$this->input->post('c_id');
			$this->Contactos_model->elim($id_eliminar);
			redirect('contactos');
		}else{
			
			$data['datos_contactos'] = $this->Contactos_model->get_by_id($id);

			if (empty($data['datos_contactos'])) {
				echo 'ID invalido o Contacto no existe';
			} else {
				//pasando datos a la vista
				$this->load->view('view_elim_contactos',$data);
			}
		
		}
		
	}
}
/*fin del archivo */
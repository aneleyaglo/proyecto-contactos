<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contactos_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function get_todos() {	
		$query = $this->db->get('contactos'); /* de activeRecord*/
		return $query->result();
	}
	
	function get_by_id($id) {
		$query = $this->db->where('c_id',$id);
		$query = $this->db->get('contactos'); /* de activeRecord*/
		return $query->result();
	}
	
	function add() {
		//haciendo el insert
		$datos_insertar = $this->input->post();
		//quitando el btono de enviar
		unset($datos_insertar['btn_enviar']);
		$this->db->insert('contactos',$datos_insertar);
		//retornando el id que se inserto
		return $this->db->insert_id();
	}
	
	function edit($id){
	
		$datos_insertar = $this->input->post();
		unset($datos_insertar['btn_enviar']);
		
		$this->db->where('c_id',$id);
		$this->db->update('contactos',$datos_insertar);
	}
	
	function elim($id){		
		$this->db->where('c_id',$id);
		$this->db->delete('contactos');
		
	}
	
}



/* fin del archivo modelo de contactos*/
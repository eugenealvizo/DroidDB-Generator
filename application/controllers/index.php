<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Index extends CI_Controller {

	public function page(){
	$this->load->view('view_info');
	}

	public function getInputData() {
	$data['databaseName'] = $this->input->post('databaseName');
	$data['tableName'] = $this->input->post('tableName');

	$data['fieldName'] = $this->input->post('fieldName');
	$data['typeName'] = $this->input->post('typeName');
	$data['checked'] = $this->input->post('checked');
	$this->load->view('db_creator', $data);	
	}


	public function getInputData2() {
	$data['databaseName'] = $this->input->post('databaseName');
	$data['tableName'] = $this->input->post('tableName');

	$data['fieldName'] = $this->input->post('fieldName');
	$data['typeName'] = $this->input->post('typeName');
	$data['checked'] = $this->input->post('checked');
	$this->load->view('handler', $data);	
	}


}

	

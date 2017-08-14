<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotesController extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('NoteModel');
	}


	public function index()
	{	
		$response = [];
		$response['data'] = $this->NoteModel->allNotes();
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function insertNote()
	{
		$response = [];
		$response['method'] = 'INSERT';


		//public function createNote( $note_title, $note )
		$user_id = $this->input->post('user_id');
		$note_title = $this->input->post('title');
		$note = $this->input->post('note');

		if( empty($user_id) || empty($note_title) || !$this->NoteModel->createNote($note_title, $note))
		{
			//throw some exception 
			//throw status 500
			echo "there as an error";
			exit;
		}



		$this->output->set_header('HTTP/1.0 201 OK');	
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function updateNote()
	{
		$response = [];
		$response['method'] = 'UPDATE';
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function deleteNote()
	{
		$response = [];
		$response['method'] = 'DELETE';
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}




}

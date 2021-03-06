<?php




defined('BASEPATH') OR exit('No direct script access allowed');



class NotesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('NoteModel');

		$this->load->library("ValidRequest", $this->config->item('passwords'));
	}
	/**
	* Get all notes
	*/
	public function index()
	{	
		$this->isValid();
		$response = [];
		$response['data'] = $this->NoteModel->allNotes();
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	/**
	* Insert note
	* @param (int) user_id
	* @param (string) title
	* @param (string) note
	*/
	public function insertNote()
	{
		$this->isValid();

		$response = [];
		
		//public function createNote( $note_title, $note )
		$user_id = $this->input->post('user_id');
		$note_title = $this->input->post('title');
		$note = $this->input->post('note');

		if( empty($user_id) || empty($note_title))
		{
			//throw some exception 
			//throw status 500
			//echo "there as an error"
			$this->output->set_status_header(401);
			exit;
		} 
		else if (!$this->NoteModel->createNote($note_title, $note)) {
			$this->output->set_status_header(403);
			exit;
		} else 
		{
			$response['success'] = true;
			$this->output->set_header('HTTP/1.0 201 OK');	
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	/**
	* Update existing note
	* 
	* @param (int) user_id
	* @param (int) note_id
	* @param (string) note
	* @param (string) note_title
	*/
	public function updateNote()
	{
		$this->isValid();

		$response = [];
		$user_id = $this->input->input_stream('user_id');
		$note_id = $this->input->input_stream('note_id');
		$note = $this->input->input_stream('note');
		$note_title = $this->input->input_stream('note_title');


		if( empty( $user_id) || empty( $note))
		{
			//throw some exception 
			//throw status 500
			//echo "there as an error"
			$this->output->set_status_header(401);
			exit;
		} 
		else if (!$this->NoteModel->updateNoteById($note_id, $note_title, $note))
		{
			$this->output->set_status_header(403);
			exit;
		}
		else
		{
			$response['success'] = true;
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	/**
	* Delete note
	*
	* @param (int) user_id
	* @param (int) note_id
	*/
	public function deleteNote()
	{
		$this->isValid();


		$response = [];
		//$response['method'] = 'DELETE';

		$user_id = $this->input->input_stream('user_id');
		$note_id = $this->input->input_stream('note_id');

		if( empty( $user_id) || empty($note_id)) 
		{
			//throw some exception 
			//throw status 500
			//echo "there as an error"
			$this->output->set_status_header(401);
			exit;
		} 
		else if( !$this->NoteModel->deleteNoteById($note_id) )
		{
			$this->output->set_status_header(403);
			exit;
		}
		else
		{
			$response['success'] = true;
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	/**
	* Makes sure the request is valid with basic auth
	*
	*/
	protected function isValid()
	{
		if( !$this->validrequest->isValid())
		{
			$this->output->set_status_header(403);
			exit;
		}
	}


}

<?php 


class CurlController extends CI_Controller {

	protected $url = "http://192.168.1.124/index.php/api/notes";


	public function __construct()
	{
		//parent::__construct();
	}

	public function createNote()
	{
		
   	 	//public function createNote( $note_title, $note )
		$user_id = 1;
		$title = "this is another test" . time();
		$note = "notes for the user at " . time();

   	 	$postString = 'user_id='.urlencode($user_id) . '&title=' . urldecode($title) . '&note=' . urldecode($note);

   	 	$ch = curl_init();

   	 	curl_setopt($ch, CURLOPT_URL, $this->url);
   	 	curl_setopt($ch, CURLOPT_POST, 1);
   	 	curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
   	 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   	 	
   	 	$headers = [
		    'Authorization: Basic password'
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

   	 	$server_output = curl_exec ($ch);
   	 	curl_close ($ch);
   
   	 	var_dump($server_output);

	}

	public function getAllNotes()
	{
		$ch = curl_init();

   	 	curl_setopt($ch, CURLOPT_URL, $this->url);
   	 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   	 	$headers = [
		    'Authorization: Basic password'
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

   	 	$server_output = curl_exec ($ch);
   	 	curl_close ($ch);
   
   	 	var_dump($server_output);
	}

	

	public function updateNote()
	{
		$user_id = 1;
		$note_id = 1;
		$title = "UDPATED TITLE: this is another updated test" . time();
		$note = "UDPATED NOTE: notes for the user updatedat " . time();

		$data = array(
			'user_id' => $user_id,
			'note_id' => $note_id,
			'title' => $title,
			'note' => $note
		);

		$ch = curl_init();
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

		$headers = [
		    'Authorization: Basic password'
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	   	$server_output = curl_exec ($ch);
	   	curl_close ($ch);
	   
	   	var_dump($server_output);
	}

	public function deleteNote()
	{
		$user_id = 1;
		$note_id = 2;

		$data = array(
			'user_id' => $user_id,
			'note_id' => $note_id,
		);


		$ch = curl_init();
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

		$headers = [
		    'Authorization: Basic password'
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	   	$server_output = curl_exec ($ch);
	   	curl_close ($ch);
	   
	   	var_dump($server_output);


	}



}
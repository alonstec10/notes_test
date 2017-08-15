<?php 


/***
  `user_notes_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `note_id` int(11) unsigned NOT NULL,
*/


class UserNoteModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert( $user_id, $note_id ) 
	{
		$sql = "INSERT INTO user_notes(user_id, note_id) VALUES (?, ?)";
		if( $this->db->query($sql, array( $user_id, $note_id)))
		{
			return true;
		}
		else
		{
			return false;
		}

	}






}
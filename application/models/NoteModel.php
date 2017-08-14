<?php defined('BASEPATH') OR exit('No direct script access allowed');

class NoteModel extends CI_Model {

	private $messages 	=	array();

	public function __construct()
	{
		parent::__construct();
		
	}
   	/**
	* Get all notes
	*
	* @return (array) notes
	*/
	public function allNotes()
	{
		$sql = "SELECT note_id, note_title, note, note_created, note_updated FROM note";

		$query = $this->db->query($sql);

		$rows = [];
		while( $row = $query->row() ) 
		{
			$rows[] = $row;
		}
		return $rows;
	}

	/**
	* Get note by id
	*
	* @return (object) record
	*/
	public function getNoteById( $note_id )
	{
		$sql = "SELECT note_id, note_title, note, note_created, note_updated FROM note WHERE note_id=?";

		$result = $this->db->query( $sql, array( $note_id) );

		return $result;
	}

	/**
	* create note
	*
	* @param (string) $note_title
	* @param (string) note
	* @return (bool)
	*/
	public function createNote( $note_title, $note )
	{
		$sql = "INSERT INTO note( note_title, note, note_created ) VALUES (?, ?, NOW())";
	
		if( $this->db->query($sql, array($note_title, $note)) ) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}

	/**
	* Update note
	*
	* @param (int) note_id
	* @param (string) note_title
	* @param (string) note
	* @return (bool)
	*/
	public function updateNoteById( $note_id, $note_title, $note )
	{
		$sql = "UPDATE note SET note_title=?, note=? WHERE note_id=?";

		if( $this->db->query($sql, array($note_title, $note, $note_id)))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/**
	* Delete not by id
	*
	* @param (int) note_id
	* @return (bool)
	*/
	public function deleteNoteById( $note_id)
	{
		$sql = "DELETE FROM note WHERE note_id=?";
		if( $this->db->query($sql, array($note_id)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}




}
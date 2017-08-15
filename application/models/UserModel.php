<?php 


/***
REATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_created` datetime DEFAULT NULL,
  `user_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
*/


class UserModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}


	public function userExists( $user_id )
	{
		$sql = "SELECT count(user_id) as cnt FROM user WHERE user_id=?";
		$result = $this->db->query( $sql, array( $user_id) );

		if( $result->cnt > 0 )
		{
			return true;
		}  
		else
		{
			return false;
		}

	}

	public function getUserById( $user_id )
	{
		$sql ="SELECT user_id, user_email, user_password, user_created FROM user WHERE user_id=?";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function getUserByEmail( $user_email ) 
	{
		$sql = "SELECT user_id, user_email, user_password, user_created FROM user WHERE user_email=?";
		$result = $this->db->query( $sql );
		return $result->row();
	}




}
<?php

use Zend\Config\Config;
use Zend\Config\Factory;
use Zend\Http\PhpEnvironment\Request;


class ValidRequest {

	protected $passwords = array();


	public function __construct(array $passwords )
	{
		$this->passwords = $passwords;
	}

	/**
	* Validate the Basic Header in Authorization
	*/
	public function isValid()
	{
		$request = new Request();
    	$authHeader = $request->getHeader('Authorization');

    	if( !$authHeader ) 
    	{
    		return false;
    	}
    	else
    	{

    		list($password) = sscanf($authHeader->toString(), 'Authorization: Basic %s');

    		if( !in_array($password, $this->passwords))
    		{
    			return false;
    		}
    		else
    		{
    			return true;
    		}
    	}
	}



}
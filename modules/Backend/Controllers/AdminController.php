<?php 

namespace Backend\Controllers;

class AdminController extends \Controller 
{
	public $theme;

	public $data = array();

	public function __construct()
	{	
		//set themes admin
		$this->theme = \Theme::uses('admin');

		$this->data = array();
	}
}
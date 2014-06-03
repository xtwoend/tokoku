<?php namespace Backend\Controllers;

use Backend\Controllers\AdminController;
use Redirect, Sentry, Input;

class DashController extends AdminController
{
	public function index()	
	{	//set title 
		$this->theme->setTitle('Dashboard');
		$this->theme->setSubtitle('this dashboard alala');
		//set Breadcrumb
		$this->theme->breadcrumb()->add('home', 'http://...')->add('dashboard', 'http://...');

		return $this->theme->scope('dashboard', $this->data)->render();
	}

}
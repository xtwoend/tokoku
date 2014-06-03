<?php namespace Backend\Controllers;

use Backend\Controllers\AdminController;
use Redirect, Sentry, Input;

class AuthController extends AdminController
{
	public function index()	
	{	
		$this->theme->layout('login');
		return $this->theme->scope('login', $this->data)->render();
	}

	public function auth()
	{
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, Input::get('remember_me'));

		    return Redirect::to('admin');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return 'User is not activated.';
		}
		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    return 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return 'User is banned.';
		}
	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to('admin/login');
	}
}
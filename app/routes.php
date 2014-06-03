<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/test', function(){

	$product = Product::getAll();

	return $product;
});

Route::get('/create', function(){
	
	$group = Sentry::createGroup(array(
        'name'        => 'Administrator',
        'permissions' => array(
            'admin' => 1,
            'users' => 1,
        ),
    ));

	$user = Sentry::createUser(array(
        'email'     => 'admin@admin.com',
        'password'  => 'admin',
        'activated' => true,
    ));

    // Find the group using the group id
    $adminGroup = Sentry::findGroupById(1);

    // Assign the group to the user
    $user->addGroup($adminGroup);
});

Route::get('/theme', function(){
	
	//use Theme
	$theme = Theme::uses('admin');
	
	//set Title
	$theme->setTitle('Hore');
	

	$keywords = [
		'test', 'laravel', 'blog', 'title'
	];
	//set keywords meta
	$theme->setKeywords(implode(', ', $keywords));

	//set description
	$theme->setDescription('test description of the world');

	//data
	$data = [
		'test'	=> 'Test Data'
	];
	
	//return testing view  index path app/views
	return $theme->scope('login', $data)->render();

	// home.index will look up the path 'app/views/mobile/home/index.php'
    //$theme->ofWithLayout('home.index', $view)->render();

    // home.index will look up the path 'public/themes/default/views/home/index.php'
    // return $theme->scope('home.index', $view)->render();

    // home.index will look up the path 'public/themes/default/views/mobile/home/index.php'
    //$theme->scopeWithLayout('home.index', $view)->render();
});

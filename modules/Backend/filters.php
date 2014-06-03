<?php

//route filter sentry
Route::filter('authsentry', function()
{
	if (! Sentry::check()) return Redirect::guest('admin/login');
});
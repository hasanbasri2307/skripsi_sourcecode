<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function showLogin()
    {
        return View::make('pages.login');
    }

    public function error401()
    {
        return View::make('pages.401');
    }
    
    public function error401front()
    {
        return View::make('pages.error401');
    }

}

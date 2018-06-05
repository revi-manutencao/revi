<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class MainController extends Controller {

	public function index () {
	    if(Auth::isLogged())
            view('home-user');
        else
	        view('home-info');
	}
}

<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class MainController extends Controller {

	public function index () {
	    view('home-info');

//		view('UserHome');
//		if(isset($_POST)){
//		    $this->LoginPost();
//        }
	}

	public function login () {
	    view('login');
    }


	public function LoginPost(){
	    echo "aaa";
    }
}

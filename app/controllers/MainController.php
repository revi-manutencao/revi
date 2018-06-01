<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class MainController extends Controller {

	public function index () {
		view('UserHome');
		if(isset($_POST)){
		    $this->LoginPost();
        }
	}
	public function LoginPost(){
	    echo "aaa";
    }
}

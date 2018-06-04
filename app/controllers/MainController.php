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
	    switch($this->getRequest()) {
            case 'get':
                view('login');
                break;
            case 'post':
                echo 'abbsfafrw4';
                break;
        }
    }

	public function cadastro () {
	    switch($this->getRequest()) {
            case 'get':
                view('cadastro');
                break;
            case 'post':
                echo 'abbsfafrw4';
                break;
        }
    }


    public function user () {
	    view('home-user');
    }

//
//	public function LoginPost(){
//	    echo "aaa";
//    }
}

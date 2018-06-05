<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class UserController extends Controller {

	public function index () { }


    public function login () {
	    if(Auth::isLogged())
	        redirect('/');
	    else
            switch($this->getRequest()) {
                case 'get':
                    view('login');
                    break;
                case 'post':
                    $post = filterPost();

                    if(!Auth::bindAuth($post)){
                        back()->flash('error', 'Nome de usuário ou senha incorretos');
                        die;
                    }

                    $user = User::make()->where('login = ? and password = ?',
                        [$post['username'], Auth::hashPassword($post['password'])])->find()[0];

                    $user->setPassword(null);

                    Auth::createAuthSession($user, '/');
                    break;
            }
    }

    public function cadastro () {
        if(Auth::isLogged())
            redirect('/');
        else
            switch($this->getRequest()) {
                case 'get':
                    view('cadastro');
                    break;
                case 'post':
                    Validation::check(filterPost(), array(
                        'name' => 'required|alpha',
                        'username' => 'required|min:6|alphanum',
                        'email' => 'required|email',
                        'password' => 'required',
                        'confirmpassword' => 'required|equal:password'
                    ));

                    $post = filterPost();

                    $result = User::make()->where('login = ? or email = ?', [$post['username'], $post['email']])->find();

                    if(count($result) > 0) {
                        back()->flash('error', 'Usuário já existente');
                        die;
                    }

                    $user = User::make();
                    $user->setLogin($post['username']);
                    $user->setName($post['name']);
                    $user->setEmail($post['email']);
                    $user->setPassword(Auth::hashPassword($post['password']));
                    $user->save();

                    redirect('entrar')
                        ->flash('success', 'Usuário '.$user->getLogin().' criado com sucesso.');
                    break;
            }
    }


    public function logout () {
	    Auth::doLogout();
	    redirect('/');
    }


    public static function listaProcessos () {
	    $user = Auth::getLoggedUser();
	    $processos = Process::make()->where('id_user = ?', $user->getId())->find();

        view('home-user', ['processos' => $processos]);
    }
}

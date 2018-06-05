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
                        [$post['login'], Auth::hashPassword($post['password'])]);

                    Auth::createAuthSession($user, '/');
                    break;
            }
    }

    public function cadastro () {
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
                dump($user);
                break;
        }
    }


    public function logout () {
	    Auth::doLogout();
	    redirect('/');
    }
}

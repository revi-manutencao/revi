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

                    $user = User::make()->where('login = ? and password = ?',
                        [$post['username'], Auth::hashPassword($post['password'])])->find();

                    if(!count($user) > 0){
                        back()->flash('error', 'Nome de usuário ou senha incorretos');
                        die;
                    }

                    $user = $user[0];
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
                    $valid = Validation::check(filterPost(), array(
                        'nome' => 'required|alpha',
                        'nomeusuario' => 'required|min:6|alphanum',
                        'email' => 'required|email',
                        'senha' => 'required',
                        'confirmasenha' => 'required|equal:senha'
                    ));

                    if(!$valid) {
                        back()->withValues();
                        return;
                    }

                    $post = filterPost();

                    $result = User::make()->where('login = ? or email = ?', [$post['username'], $post['email']])->find();

                    if(count($result) > 0) {
                        back()->flash('error', 'Usuário já existente');
                        die;
                    }

                    $user = User::make();
                    $user->setLogin($post['nomeusuario']);
                    $user->setName($post['nome']);
                    $user->setEmail($post['email']);
                    $user->setPassword(Auth::hashPassword($post['senha']));
                    $user->save();

                    redirect('entrar')
                        ->flash('success', 'Usuário <b>'.$user->getLogin().'</b> criado com sucesso.');
                    break;
            }
    }


    public function logout () {
	    Auth::doLogout();
	    unset($_SESSION['currentProcess']);
	    redirect('/');
    }


    public static function listaProcessos () {
	    $user = Auth::getLoggedUser();
	    $processos = Process::make()->where('id_user = ?', $user->getId())->find();

        view('home-user', ['processos' => $processos]);
    }


    public function meusDados () {
        Auth::setRestricted('entrar');

        switch($this->getRequest()) {
            case 'get':
                view('user-data');
                break;
            case 'post':
//                $valid = Validation::check(filterPost(), array(
//                    'nome' => 'required|alpha',
//                    'nomeusuario' => 'required|min:6|alphanum',
//                    'email' => 'required|email',
//                    'senha' => 'required',
//                    'confirmasenha' => 'required|equal:senha'
//                ));
//
//                if(!$valid) {
//                    back()->withValues();
//                    return;
//                }
//
//                $post = filterPost();
//
//                $result = User::make()->where('login = ? or email = ?', [$post['username'], $post['email']])->find();
//
//                if(count($result) > 0) {
//                    back()->flash('error', 'Usuário já existente');
//                    die;
//                }
//
//                $user = User::make();
//                $user->setLogin($post['nomeusuario']);
//                $user->setName($post['nome']);
//                $user->setEmail($post['email']);
//                $user->setPassword(Auth::hashPassword($post['senha']));
//                $user->save();
//
//                redirect('entrar')
//                    ->flash('success', 'Usuário <b>'.$user->getLogin().'</b> criado com sucesso.');
                break;
        }
    }
}

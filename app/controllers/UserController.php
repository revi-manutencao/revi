<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class UserController extends Controller {

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
                        'nomeusuario' => 'required|alphanum',
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
                        back()->flash('error', 'Nome de usuário ou e-mail já cadastrado');
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
	    Auth::setRestricted('entrar');
	    Auth::doLogout();
	    unset($_SESSION['currentProcess']);
	    redirect('/');
    }


    public static function listaProcessos () {
        Auth::setRestricted('entrar');
	    $user = Auth::getLoggedUser();
	    $processos = Process::make()->where('id_user = ?', $user->getId())->find();

        view('home-user', ['processos' => $processos]);
    }


    public function meusDados () {
        Auth::setRestricted('entrar');

        switch($this->getRequest()) {
            case 'get':
                $userLogged = Auth::getLoggedUser();

                $user = User::make()->get($userLogged->getId());
                $processos = Process::make()->where('id_user = ?', $user->getId());
                view('user-data', ['user' => $user, 'quantProcesses' => count($processos)]);
                break;
            case 'post':
                dump(filterPost());
                $valid = Validation::check(filterPost(), array(
                    'nome' => 'required|alpha',
                    'email' => 'required|email',
                ));

                if(!$valid) {
                    back();
                    return;
                }

                $post = filterPost();

                $userLogged = Auth::getLoggedUser();

                $user = User::make()->get($userLogged->getId());
                $user->setName($post['nome']);
                $user->setEmail($post['email']);
                $user->save();

                redirect('meusdados')->flash('success', "Dados alterados");
                break;
        }
    }


    public function alterarSenha () {
        switch($this->getRequest()) {
            case 'post':
                $post = filterPost();

                $userLogged = Auth::getLoggedUser();

                // Obtém os dados do usuário e faz o hash da senha digitada
                $user = User::make()->get($userLogged->getId());
                $prevHash = Auth::hashPassword($post['senhaatual']);

                // Verifica se a senha digitada está correta
                if($prevHash !== $user->getPassword()) {
                    back()->flash('erroSenha', 'A senha atual está incorreta');
                    return;
                }


                // Valida os dados inseridos
                $valid = Validation::check(filterPost(), array(
                    'senhaatual' => 'required',
                    'novasenha' => 'required',
                    'confirmarnovasenha' => 'required|equal:novasenha',
                ));

                if(!$valid) {
                    back();
                    return;
                }


                // Salva a nova senha
                $user->setPassword(Auth::hashPassword($post['novasenha']));
                $user->save();

                // Faz o logout e dá mensagem de sucesso
                Auth::doLogout();
                redirect('entrar')
                    ->flash('success', "Sua senha foi alterada.<br>Faça o login com os novos dados");

                break;

            default:
                // Redireciona caso tente acessar por qulaquer método que não o post
                redirect('meusdados');
                break;
        }
    }
}

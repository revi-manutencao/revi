<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class UserController extends Controller
{

    public static function listaProcessos()
    {
        Auth::setRestricted('entrar');

        // Obtém os dados do usuário logado e seus processos
        $user = Auth::getLoggedUser();
        $processos = Process::make()
            ->where('id_user = ? and name != "" and active = true', $user->getId())
            ->orderBy('updated_at', 'desc')
            ->find();

        $unfinishedProcess = Process::make()
            ->where('active = true and name = "" and id_user = ?', $user->getId())->find();

        if (count($unfinishedProcess) > 0) {
            $processFeatures = ProcessFeature::make()->where('id_process = ?', $unfinishedProcess[0]->getId())->find();
            $phaseNumber = count($processFeatures) + 1;

            // Conta o total de etapas de processo a serem preenchidas
            $countPhases = count(Phase::make()->all());


            // Armazena o valor de completude do processo atualmente
            $percentage = number_format((($phaseNumber / $countPhases) - (1 / $countPhases)) * 100, 2);

            $unfinished = ['obj' => $unfinishedProcess, 'phaseNo' => $phaseNumber, 'percentage' => $percentage];
        } else {
            $unfinished = array();
        }

        view('home-user', ['processos' => $processos, 'processoNaoTerminado' => $unfinished]);
    }

    public function login()
    {
        if (Auth::isLogged())
            redirect('/');
        else
            switch ($this->getRequest()) {
                case 'get':
                    view('login');
                    break;
                case 'post':
                    $post = filterPost();

                    $user = User::make()->where('login = ? and password = ?',
                        [$post['username'], Auth::hashPassword($post['password'])])->find();

                    if (!count($user) > 0) {
                        back()->flash('error', 'Nome de usuário ou senha incorretos');
                        die;
                    }

                    $user = $user[0];
                    $user->setPassword(null);

                    //Registra log
                    $log = Log::make();
                    $log->setTitle("Login realizado");
                    $log->setDescription("O usuário #" . $user->getID() . ' (' . $user->getLogin() . ') realizou o login');
                    $log->setDatetime(date('Y-m-d H:i:s'));
                    $log->setIdUser($user->getId());
                    $log->save();

                    Auth::createAuthSession($user, '/');
                    break;
            }
    }

    public function cadastro()
    {
        if (Auth::isLogged())
            redirect('/');
        else
            switch ($this->getRequest()) {
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

                    if (!$valid) {
                        back()->withValues();
                        return;
                    }

                    $post = filterPost();

                    $result = User::make()->where('login = ? or email = ?', [$post['nomeusuario'], $post['email']])->find();

                    if (count($result) > 0) {
                        back()->flash('error', 'Nome de usuário ou e-mail já cadastrado');
                        die;
                    }

                    // Cria o objeto e preenche com os dados
                    $user = User::make();
                    $user->setLogin($post['nomeusuario']);
                    $user->setName($post['nome']);
                    $user->setEmail($post['email']);
                    $user->setPassword(Auth::hashPassword($post['senha']));
                    $user->setActive(true);
                    $user->save();


                    //Registra log
                    $log = Log::make();
                    $log->setTitle("Usuário cadastrado");
                    $log->setDescription("O usuário #" . $user->getID()
                        . ' (' . $user->getLogin() . ') foi cadastrado no sistema');
                    $log->setDatetime(date('Y-m-d H:i:s'));
                    $log->setIdUser($user->getId());
                    $log->save();

                    redirect('entrar')
                        ->flash('success', 'Usuário <b>' . $user->getLogin() . '</b> criado com sucesso.');
                    break;
            }
    }


    public function logout()
    {
        Auth::setRestricted('entrar');

        $user = Auth::getLoggedUser();

        //Registra log
        $this->logLogout($user);

        // Realiza o logout do sistema
        Auth::doLogout();
        redirect('/');
    }


    public function meusDados()
    {
        Auth::setRestricted('entrar');

        switch ($this->getRequest()) {
            case 'get':
                $userLogged = Auth::getLoggedUser();

                // Obtém os dados do usuário e dos processos
                $user = User::make()->get($userLogged->getId());
                $processos = Process::make()
                    ->where('id_user = ? and name != "" and active = true', $user->getId())
                    ->orderBy('updated_at', 'desc')
                    ->find();

                view('user-data', ['user' => $user, 'quantProcesses' => count($processos)]);
                break;


            case 'post':
                // Valida os dados de entrada
                $valid = Validation::check(filterPost(), array(
                    'nome' => 'required|alpha',
                    'email' => 'required|email',
                ));

                if (!$valid) {
                    back();
                    return;
                }

                $post = filterPost();

                $userLogged = Auth::getLoggedUser();

                $oldValues['nome'] = $userLogged->getName();
                $oldValues['email'] = $userLogged->getEmail();

                // Obtém os dados completos do usuário
                $user = User::make()->get($userLogged->getId());
                $user->setName($post['nome']);
                $user->setEmail($post['email']);

                if (isset($post['serialView'])) {
                    $user->setSerialView(1);
                } else {
                    $user->setSerialView(0);
                }
                $user->save();


                //Registra log
                $log = Log::make();
                $log->setTitle("Dados pessoais atualizados");
                $log->setDescription("O usuário #" . $user->getID()
                    . ' (' . $user->getLogin() . ') alterou seu nome de "' . $oldValues['nome'] . '" para"'
                    . $user->getName() . '" e email de "' . $oldValues['email'] . '" para "' . $user->getEmail() . '"');
                $log->setDatetime(date('Y-m-d H:i:s'));
                $log->setIdUser($user->getId());
                $log->save();


                redirect('meusdados')->flash('success', "Dados alterados");
                break;
        }
    }


    public function alterarSenha()
    {
        switch ($this->getRequest()) {
            case 'post':
                $post = filterPost();

                $userLogged = Auth::getLoggedUser();

                // Obtém os dados do usuário e faz o hash da senha digitada
                $user = User::make()->get($userLogged->getId());
                $prevHash = Auth::hashPassword($post['senhaatual']);

                // Verifica se a senha digitada está correta
                if ($prevHash !== $user->getPassword()) {
                    back()->flash('erroSenha', 'A senha atual está incorreta');
                    return;
                }


                // Valida os dados inseridos
                $valid = Validation::check(filterPost(), array(
                    'senhaatual' => 'required',
                    'novasenha' => 'required',
                    'confirmarnovasenha' => 'required|equal:novasenha',
                ));

                if (!$valid) {
                    back();
                    return;
                }


                // Salva a nova senha
                $user->setPassword(Auth::hashPassword($post['novasenha']));
                $user->save();


                //Registra log
                $log = Log::make();
                $log->setTitle("Senha alterada");
                $log->setDescription("O usuário #" . $user->getID()
                    . ' (' . $user->getLogin() . ') alterou sua senha');
                $log->setDatetime(date('Y-m-d H:i:s'));
                $log->setIdUser($user->getId());
                $log->save();


                //Registra log do logout do sistema
                $this->logLogout($user);

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


    // Realiza o Log do processo de logout
    private function logLogout($user)
    {
        //Registra log
        $log = Log::make();
        $log->setTitle("Logout realizado");
        $log->setDescription("O usuário #" . $user->getID() . ' (' . $user->getLogin() . ') saiu do sistema');
        $log->setDatetime(date('Y-m-d H:i:s'));
        $log->setIdUser($user->getId());
        $log->save();
    }
}

<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ProcessController extends Controller {

	public function novoProcesso () {
	    Auth::setRestricted('entrar');

        // Obtém o(s) processo(s) ativos e não finalizado(s) do usuário (ideal que seja no máximo 1)
        $unfinishedProcesses = Process::make()
            ->where('active = true and name = "" and id_user = ?', Auth::getLoggedUser()->getId())
            ->find();


        // Define o processo a ser preenchido
        if(count($unfinishedProcesses) == 0)
            $currentProcess = new Process();
        else
            $currentProcess = $unfinishedProcesses[0];



        // Verifica quão completo o processo está e define a etapa atual da escolha
        if($currentProcess->getId() == null)
            $phaseNumber = 1;
        else {
            $processFeatures = ProcessFeature::make()->where('id_process = ?', $currentProcess->getId())->find();

            $phaseNumber = count($processFeatures) + 1;
        }

        // Conta o total de etapas de processo a serem preenchidas
        $countPhases = count(Phase::make()->all());

        // Obtém o usuário logado
        $user = Auth::getLoggedUser();


        // Verifica o método da requisição
	    switch (getRequest()){
            case 'get':

                // Armazena o valor de completude do processo atualmente
                $percentage = number_format((($phaseNumber/$countPhases) - (1/$countPhases)) * 100, 2);

                if($phaseNumber <= $countPhases) {
                    // Obtém o objeto referente à etapa atual
                    $objPhase = Phase::make()->where('active = true and id = ?', $phaseNumber)->find();


                    // Caso não encontre a etapa do processo em questão
                    if (count($objPhase) == 0) {
                        echo 'Houve um problema';
                        die;
                    }

                    // Retira o objeto do vetor
                    $objPhase = $objPhase[0];

                    // Obtém as features da etapa
                    $features = Feature::make()->where('id_phase = ?', $objPhase->getId())->find();

                    // Define os dados que serão enviados para a view
                    $viewData = ['phase' => $objPhase, 'features' => $features, 'percentage' => $percentage];

                    view('choice-base', $viewData);
                }
                else {
                    // Quando acabarem as etapas de escolha, solicitar o nome e descrição
                    view('process-namer');
                }
                break;




            case 'post':
                // Obtém os dados do POST
                $post = filterPost();

                $novoProcesso = false;

                if($phaseNumber <= $countPhases) {
                    // Preenche os dados do processo
                    if ($currentProcess->getCreatedAt() == null) {
                        $currentProcess->setCreatedAt(date('Y-m-d H:i:s'));
                        $currentProcess->setActive(true);
                        $currentProcess->setIdUser(Auth::getLoggedUser()->getId());
                        $novoProcesso = true;
                    }

                    $currentProcess->setUpdatedAt(date('Y-m-d H:i:s'));
                    $currentProcess->save();

                    if($novoProcesso) {
                        //Registra log da criação inicial
                        $log = Log::make();
                        $log->setTitle('Processo criado');
                        $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                            .') criou um novo processo (#'.$currentProcess->getId().')');
                        $log->setDatetime(date('Y-m-d H:i:s'));
                        $log->setIdUser($user->getId());
                        $log->setIdProcess($currentProcess->getId());
                        $log->save();

                    }


                    //Registra log do registro de nova etapa do processo
                    $log = Log::make();
                    $log->setTitle('Selecionada opção para etapa de novo processo');
                    $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                        .') registrou a escolha da etapa #'.$phaseNumber
                        .' para o processo #'.$currentProcess->getId().' com a feature #'.$post['choice']);
                    $log->setDatetime(date('Y-m-d H:i:s'));
                    $log->setIdUser($user->getId());
                    $log->setIdProcess($currentProcess->getId());
                    $log->save();


                    // Salva o objeto ProcessFeature relacionando à opção realizada pelo usuário
                    $pf = new ProcessFeature();
                    $pf->setIdProcess($currentProcess->getId());
                    $pf->setIdFeature($post['choice']);
                    $pf->save();

                    // Redireciona para a mesma página a fim de continuar o processo
                    redirect('criar');
                }
                else {
                    // Preenche o nome e descrição do processo ao final de todas as etapas
                    $valid = Validation::check($post, array(
                        'nomeprocesso' => 'required|max:200'
                    ));

                    if(!$valid) {
                        back()->withValues();
                        return;
                    }


                    // Salva os dados novos do processo
                    $currentProcess->setName(htmlspecialchars($post['nomeprocesso'], ENT_QUOTES));
                    $currentProcess->setDescription(htmlspecialchars($post['descricaoprocesso'], ENT_QUOTES));
                    $currentProcess->setUpdatedAt(date('Y-m-d H:i:s'));
                    $currentProcess->save();


                    //Registra log do registro de nova etapa do processo
                    $log = Log::make();
                    $log->setTitle('Adicionados nome e descrição ao novo processo');
                    $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                        .') adicionou ao processo #'.$currentProcess->getId().' o nome "'.$currentProcess->getName()
                        .'" e a descrição "'.$currentProcess->getDescription().'"');
                    $log->setDatetime(date('Y-m-d H:i:s'));
                    $log->setIdUser($user->getId());
                    $log->setIdProcess($currentProcess->getId());
                    $log->save();

                    redirect('/');
                }
                break;
        }
    }


    public function verProcesso ($data) {
	    Auth::setRestricted('entrar');

	    // Obtém os dados do processo e do usuário
	    $processo = Process::make()->get($data['id']);
	    $user = Auth::getLoggedUser();


	    // Redireciona se o processo não for do usuário logado ou estiver inativo
	    if($processo->getIdUser() !== $user->getId() || $processo->getActive() == false){
	        redirect('/');
	        return;
        }


        // Define um vetor para armazenar os dados das etapas e da feature escolhida para cada uma
        $arrEtapasFeatures = array();

	    // Obtém todas as features do processo
        $pf = ProcessFeature::make()->where('id_process = ?', $processo->getId())->find();

        // Organiza os dados das etapas e das features no vetor
        foreach($pf as $pfeature) {
            $feature = Feature::make()->get($pfeature->getIdFeature());
            $phase = Phase::make()->get($feature->getIdPhase());

            $arrEtapasFeatures[] = [
                'phase' => $phase->getName(),
                'idFeature' => $feature->getId(),
                'nameFeature' => $feature->getName()
            ];
        }

        view('process-viewer', ['processo' => $processo, 'arrEtapas' => $arrEtapasFeatures]);
    }


    public function editarProcesso ($data) {
	    Auth::setRestricted('/');

	    $id = $data['id'];

	    $user = Auth::getLoggedUser();
	    $processo = Process::make()->where('id_user = ? and active = true and id = ?', [$user->getId(), $id])->find();

	    if(count($processo) == 0){
	        redirect('/');
	        return;
        }

        $processo = $processo[0];

	    switch ($this->getRequest()){
            case 'get':
                view('process-editor', ['processo' => $processo]);
                break;

            case 'post':
                $post = filterPost();


                // Preenche o nome e descrição do processo
                $valid = Validation::check($post, array(
                    'nomeprocesso' => 'required|max:200'
                ));

                if(!$valid) {
                    back()->withValues();
                    return;
                }

                $oldValues['nomeprocesso'] = $processo->getName();
                $oldValues['descricaoprocesso'] = $processo->getDescription();


                // Salva os dados novos do processo
                $processo->setName(htmlspecialchars($post['nomeprocesso'], ENT_QUOTES));
                $processo->setDescription(htmlspecialchars($post['descricaoprocesso'], ENT_QUOTES));
                $processo->setUpdatedAt(date('Y-m-d H:i:s'));
                $processo->save();

                //Registra log
                $log = Log::make();
                $log->setTitle('Dados do processo alterados');
                $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                    .') alterou os dados processo #'.$processo->getId().', com o nome de "'.$oldValues['nomeprocesso']
                    .'" para "'. $processo->getName().'" e a descrição de "'.$oldValues['descricaoprocesso'].'" para "'
                    .$processo->getDescription().'"');
                $log->setDatetime(date('Y-m-d H:i:s'));
                $log->setIdUser($user->getId());
                $log->save();

                redirect('/processo/'.$processo->getId());
                break;
        }
    }


    public function apagarProcesso ($data) {
	    Auth::setRestricted('/');

	    $id = $data['id'];

	    $processo = Process::make()->get($id);
	    $user = Auth::getLoggedUser();

	    if($processo->getIdUser() != $user->getId()){
	        redirect('/');
	        return;
        }

        $processo->setActive(false);
        $processo->save();


        //Registra log
        $log = Log::make();
        $log->setTitle('Processo apagado');
        $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
            .') apagou o processo #'.$processo->getId());
        $log->setDatetime(date('Y-m-d H:i:s'));
        $log->setIdUser($user->getId());
        $log->save();

        redirect('/');
    }


    public function cancelarCriacao () {
        Auth::setRestricted('/');

        $user = Auth::getLoggedUser();
        $processo = Process::make()->where('id_user = ? and active = true and name = ""', $user->getId())->find();

        if(count($processo) == 0){
            redirect('/');
            return;
        }


        $processo = $processo[0];
        $featProc = ProcessFeature::make()->where('id_process = ?', $processo->getId())->find();

        foreach($featProc as $fp) {
            $fp->delete();
        }

        $processo->delete();


        //Registra log
        $log = Log::make();
        $log->setTitle("Criação de processo cancelada");
        $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
            .') cancelou a criação do processo #'.$processo->getId());
        $log->setDatetime(date('Y-m-d H:i:s'));
        $log->setIdUser($user->getId());
        $log->setIdProcess($processo->getId());
        $log->save();

        redirect('/');
    }

    public function editarEtapas ($params) {
        Auth::setRestricted('entrar');

        // Obtém o(s) processo(s) ativos e não finalizado(s) do usuário (ideal que seja no máximo 1)
        $unfinishedProcesses = Process::make()
            ->where('active = true and name = "" and id_user = ?', Auth::getLoggedUser()->getId())
            ->find();


        // Define o processo a ser preenchido
        if(count($unfinishedProcesses) == 0)
            $currentProcess = new Process();
        else
            $currentProcess = $unfinishedProcesses[0];



        // Verifica quão completo o processo está e define a etapa atual da escolha
        if($currentProcess->getId() == null)
            $phaseNumber = 1;
        else {
            $processFeatures = ProcessFeature::make()->where('id_process = ?', $currentProcess->getId())->find();

            $phaseNumber = count($processFeatures) + 1;
        }

        // Conta o total de etapas de processo a serem preenchidas
        $countPhases = count(Phase::make()->all());

        // Obtém o usuário logado
        $user = Auth::getLoggedUser();


        // Verifica o método da requisição
        switch (getRequest()){
            case 'get':

                // Armazena o valor de completude do processo atualmente
                $percentage = number_format((($phaseNumber/$countPhases) - (1/$countPhases)) * 100, 2);

                if($phaseNumber <= $countPhases) {
                    // Obtém o objeto referente à etapa atual
                    $objPhase = Phase::make()->where('active = true and id = ?', $phaseNumber)->find();


                    // Caso não encontre a etapa do processo em questão
                    if (count($objPhase) == 0) {
                        echo 'Houve um problema';
                        die;
                    }

                    // Retira o objeto do vetor
                    $objPhase = $objPhase[0];

                    // Obtém as features da etapa
                    $features = Feature::make()->where('id_phase = ?', $objPhase->getId())->find();

                    // Define os dados que serão enviados para a view
                    $viewData = ['phase' => $objPhase, 'features' => $features, 'percentage' => $percentage];

                    view('choice-base', $viewData);
                }
                else {
                    // Quando acabarem as etapas de escolha, solicitar o nome e descrição
                    view('process-namer');
                }
                break;




            case 'post':
                // Obtém os dados do POST
                $post = filterPost();

                $novoProcesso = false;

                if($phaseNumber <= $countPhases) {
                    // Preenche os dados do processo
                    if ($currentProcess->getCreatedAt() == null) {
                        $currentProcess->setCreatedAt(date('Y-m-d H:i:s'));
                        $currentProcess->setActive(true);
                        $currentProcess->setIdUser(Auth::getLoggedUser()->getId());
                        $novoProcesso = true;
                    }

                    $currentProcess->setUpdatedAt(date('Y-m-d H:i:s'));
                    $currentProcess->save();

                    if($novoProcesso) {
                        //Registra log da criação inicial
                        $log = Log::make();
                        $log->setTitle('Processo criado');
                        $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                            .') criou um novo processo (#'.$currentProcess->getId().')');
                        $log->setDatetime(date('Y-m-d H:i:s'));
                        $log->setIdUser($user->getId());
                        $log->setIdProcess($currentProcess->getId());
                        $log->save();

                    }


                    //Registra log do registro de nova etapa do processo
                    $log = Log::make();
                    $log->setTitle('Selecionada opção para etapa de novo processo');
                    $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                        .') registrou a escolha da etapa #'.$phaseNumber
                        .' para o processo #'.$currentProcess->getId().' com a feature #'.$post['choice']);
                    $log->setDatetime(date('Y-m-d H:i:s'));
                    $log->setIdUser($user->getId());
                    $log->setIdProcess($currentProcess->getId());
                    $log->save();


                    // Salva o objeto ProcessFeature relacionando à opção realizada pelo usuário
                    $pf = new ProcessFeature();
                    $pf->setIdProcess($currentProcess->getId());
                    $pf->setIdFeature($post['choice']);
                    $pf->save();

                    // Redireciona para a mesma página a fim de continuar o processo
                    redirect('criar');
                }
                else {
                    // Preenche o nome e descrição do processo ao final de todas as etapas
                    $valid = Validation::check($post, array(
                        'nomeprocesso' => 'required|max:200'
                    ));

                    if(!$valid) {
                        back()->withValues();
                        return;
                    }


                    // Salva os dados novos do processo
                    $currentProcess->setName(htmlspecialchars($post['nomeprocesso'], ENT_QUOTES));
                    $currentProcess->setDescription(htmlspecialchars($post['descricaoprocesso'], ENT_QUOTES));
                    $currentProcess->setUpdatedAt(date('Y-m-d H:i:s'));
                    $currentProcess->save();


                    //Registra log do registro de nova etapa do processo
                    $log = Log::make();
                    $log->setTitle('Adicionados nome e descrição ao novo processo');
                    $log->setDescription("O usuário #".$user->getID().' ('.$user->getLogin()
                        .') adicionou ao processo #'.$currentProcess->getId().' o nome "'.$currentProcess->getName()
                        .'" e a descrição "'.$currentProcess->getDescription().'"');
                    $log->setDatetime(date('Y-m-d H:i:s'));
                    $log->setIdUser($user->getId());
                    $log->setIdProcess($currentProcess->getId());
                    $log->save();

                    redirect('/');
                }
                break;
        }*/
    }


    public function consultaFeature ($data) {
	    $id = $data['id'];

	    $feature = Feature::make()->where('active = true and id = ?', $id)->find();

	    if(count($feature) == 1)
	        echo toJson($feature[0]);
        else
            echo null;
    }
}

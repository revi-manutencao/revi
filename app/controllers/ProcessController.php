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

                if($phaseNumber <= $countPhases) {
                    // Preenche os dados do processo
                    if ($currentProcess->getCreatedAt() == null) {
                        $currentProcess->setCreatedAt(date('Y-m-d H:i:s'));
                        $currentProcess->setActive(true);
                        $currentProcess->setIdUser(Auth::getLoggedUser()->getId());
                    }

                    $currentProcess->setUpdatedAt(date('Y-m-d H:i:s'));
                    $currentProcess->save();


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

                    if(!$valid)
                        back()->withValues();


                    // Salva os dados novos do processo
                    $currentProcess->setName($post['nomeprocesso']);
                    $currentProcess->setDescription($post['descricaoprocesso']);
                    $currentProcess->save();

                    redirect('/');
                }
                break;
        }
    }


    public function consultaFeature($data) {
	    $id = $data['id'];

	    $feature = Feature::make()->where('active = true and id = ?', $id)->find();

	    if(count($feature) == 1)
	        echo toJson($feature[0]);
        else
            echo null;
    }
}

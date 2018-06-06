<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ProcessController extends Controller {

	public function index () { }

	public function novoProcesso () {
	    Auth::setRestricted('/login');

	    switch (getRequest()){
            case 'get':
                if(session('currentProcess') == null)
                    session('currentProcess', ['idProcess' => null, 'phase' => 1]);

                $phase = Phase::make()->where('active = true and id = ?', session('currentProcess')['phase'])->find();
                $countPhases = count(Phase::make()->all());


                // Caso não encontre a etapa do processo em questão
                if(count($phase) == 0) {
                    echo 'Houve um problema';
                    die;
                }

                $phase = $phase[0];
                $features = Feature::make()->where('id_phase = ?', $phase->getId())->find();

                $percentage = number_format((($phase->getId()/$countPhases) - (1/$countPhases)) * 100, 2);

                $viewData = ['phase' => $phase, 'features' => $features, 'percentage' => $percentage];

                view('choice-base', $viewData);
                break;




            case 'post':
                $post = filterPost();
                $cp = session('currentProcess');
                dump($cp);

                if($cp['idProcess'] == null) {
                    $process = new Process();
                    $process->setCreatedAt(date('Y-m-d H:i:s'));
                } else
                    $process = Process::make()->get($cp['idProcess']);

                $process->setUpdatedAt(date('Y-m-d H:i:s'));
                $process->setActive(true);
                $process->setIdUser(Auth::getLoggedUser()->getId());
                $process->save();

                $pf = new ProcessFeature();
                $pf->setIdProcess($process->getId());
                $pf->setIdFeature($post['choice']);
                $pf->save();

                $cp['idProcess'] = $process->getId();
                $cp['phase']++;
                session('currentProcess', $cp);

                redirect('criar');
                break;
        }
    }

	public function verDadoProcesso () {
	    view('info-base');
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

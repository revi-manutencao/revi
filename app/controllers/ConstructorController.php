<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ConstructorController extends Controller {
//    public function createTasksMgmt() {
//        $tm1 = new TasksManagement();
//        $tm2 = new TasksManagement();
//        $tm3 = $tm4 = $tm5 = new TasksManagement();
//
//        $tm1->setName('Checklist');
//        $tm1->setDescription("Os checklists são mágicos! Com eles você vai ganhar tempo, errar menos e ser
//         muito mais produtivo. Checklists são utilizados na medicina, na engenharia e até na aeronáutica. Se você trabalha
//         com internet e ainda não usa checklists, está perdendo tempo!");
//        $tm1->setActive(true);
//        dump($tm1->save());
//
//        $tm2->setName('Kanban');
//        $tm2->setDescription("O kanban é uma simbologia visual utilizada para registrar ações. Você pode
//        seguir à risca a proposta do Kanban, separando em to do, doing e done, ou ampliar essas fases para fazer um
//        gerenciamento mais detalhado, e se surpreender com os resultados!");
//        $tm2->setActive(true);
//        dump($tm2->save());
//
//        $tm3->setName('Uma coisa aí');
//        $tm3->setDescription("abacaxizinho do pirululinho");
//        $tm3->setActive(true);
//        dump($tm3->save());
//    }


    public function createPhases() {
        $ph1 = new Phase();
        $ph1->setName('Gerenciamento de tarefas');
        $ph1->setDescription('Um texto comprido descrevendo o gerenciamento de tarefas.');
        $ph1->setActive(true);
        dump($ph1->save());

        $ph2 = new Phase();
        $ph2->setName('Estrutura do ciclo de desenvolvimento');
        $ph2->setDescription('Um texto comprido descrevendo a estrutura do ciclo de desenvolvimento.');
        $ph2->setActive(true);
        dump($ph2->save());

        $ph3 = new Phase();
        $ph3->setName('Método de entrega');
        $ph3->setDescription('Um texto comprido descrevendo o método de entrega.');
        $ph3->setActive(true);
        dump($ph3->save());

        $ph4 = new Phase();
        $ph4->setName('Tempo do ciclo de desenvolvimento');
        $ph4->setDescription('Um texto comprido descrevendo o tempo do ciclo de desenvolvimento.');
        $ph4->setActive(true);
        dump($ph4->save());

        $ph5 = new Phase();
        $ph5->setName('Gerenciamento de pessoas');
        $ph5->setDescription('Um texto comprido descrevendo o gerenciamento de pessoas.');
        $ph5->setActive(true);
        dump($ph5->save());

        $ph6 = new Phase();
        $ph6->setName('Método de aplicação de métricas');
        $ph6->setDescription('Um texto comprido descrevendo o método de aplicação de métricas.');
        $ph6->setActive(true);
        dump($ph6->save());
    }


    public function createFeatures() {
        $ft1 = new Feature();
        $ft1->setIdPhase(1);
        $ft1->setName('Checklist');
        $ft1->setDescription('Os checklists são mágicos! Com eles você vai ganhar tempo, errar menos e ser
            muito mais produtivo. Checklists são utilizados na medicina, na engenharia e até na aeronáutica. Se você trabalha
     `       com internet e ainda não usa checklists, está perdendo tempo!');
        $ft1->setActive(true);
        dump($ft1->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(1);
        $ft2->setName('Quadro dividido por colunas');
        $ft2->setDescription('O kanban é uma simbologia visual utilizada para registrar ações. Você pode
            seguir à risca a proposta do Kanban, separando em to do, doing e done, ou ampliar essas fases para fazer um
            gerenciamento mais detalhado, e se surpreender com os resultados!');
        $ft2->setActive(true);
        dump($ft2->save());

        $ft2 = new Feature();
        $ft2->setIdPhase(1);
        $ft2->setName('Quadro dividido por etiquetas');
        $ft2->setDescription('Um quadro de tarefas pode ser dividido por etiquetas em que cada cor de 
            etiqueta corresponde a uma prioridade ou classificação da tarefa. Assim, são definidos atributos das
            tarefas, os quais devem ser seguidos à risca para a execução de cada uma!');
        $ft2->setActive(true);
        dump($ft2->save());
    }
}

<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ConstructorController extends Controller {
    public function createTasksMgmt() {
        $tm1 = new TasksManagement();
        $tm2 = new TasksManagement();
        $tm3 = $tm4 = $tm5 = new TasksManagement();

        $tm1->setName('Checklist');
        $tm1->setDescription("Os checklists são mágicos! Com eles você vai ganhar tempo, errar menos e ser
         muito mais produtivo. Checklists são utilizados na medicina, na engenharia e até na aeronáutica. Se você trabalha 
         com internet e ainda não usa checklists, está perdendo tempo!");
        $tm1->setActive(true);
        dump($tm1->save());

        $tm2->setName('Kanban');
        $tm2->setDescription("O kanban é uma simbologia visual utilizada para registrar ações. Você pode
        seguir à risca a proposta do Kanban, separando em to do, doing e done, ou ampliar essas fases para fazer um
        gerenciamento mais detalhado, e se surpreender com os resultados!");
        $tm2->setActive(true);
        dump($tm2->save());

        $tm3->setName('Uma coisa aí');
        $tm3->setDescription("abacaxizinho do pirululinho");
        $tm3->setActive(true);
        dump($tm3->save());
    }
}

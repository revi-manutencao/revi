<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ConstructorController extends Controller {
    public function createTasksMgmt() {
//        echo 'olár'; die; // Apenas para testar o funcionamento da rota

        $tm1 = new TasksManagement();
        $tm2 = new TasksManagement();
        $tm3 = $tm4 = $tm5 = new TasksManagement();

        $tm1->setName('Uma coisa aí');
        $tm1->setDescription("abacaxizinho do pirululinho");
        $tm1->setActive(true);
        dump($tm1->save());

        $tm2->setName('Uma coisa aí');
        $tm2->setDescription("abacaxizinho do pirululinho");
        $tm2->setActive(true);
        dump($tm2->save());

        $tm3->setName('Uma coisa aí');
        $tm3->setDescription("abacaxizinho do pirululinho");
        $tm3->setActive(true);
        dump($tm3->save());

        $tm4->setName('Uma coisa aí');
        $tm4->setDescription("abacaxizinho do pirululinho");
        $tm4->setActive(true);
        dump($tm4->save());

        $tm5->setName('Uma coisa aí');
        $tm5->setDescription("abacaxizinho do pirululinho");
        $tm5->setActive(true);
        dump($tm5->save());
    }
}

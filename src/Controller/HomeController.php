<?php

namespace App\Controller;

class HomeController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
    
        $this->Authentication->allowUnauthenticated(['index']);
    }


    public function index()
    {
        //
    }

}

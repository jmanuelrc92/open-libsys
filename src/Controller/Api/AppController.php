<?php
namespace App\Controller\Api;

use Cake\Controller\Controller;
use Crud\Controller\ControllerTrait;

class AppController extends Controller
{
    use ControllerTrait;
    
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false
        ]);
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.Update',
                'Crud.View',
                'Crud.Delete',
                'Crud.Add'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog'
            ]
        ]);
        //$this->loadComponent('Flash');
    }
}
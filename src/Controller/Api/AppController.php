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
                'CrudJsonApi.JsonApi',
                'CrudJsonApi.Pagination',
                'Crud.ApiQueryLog'
            ]
        ]);
        //$this->loadComponent('Flash');
    }
}
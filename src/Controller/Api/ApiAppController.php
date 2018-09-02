<?php
namespace App\Controller\Api;

use Cake\Controller\Controller;
use Crud\Controller\ControllerTrait;

class ApiAppController extends Controller
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
                'Crud.View'
                //'Crud.Update',
                //'Crud.Delete',
                //'Crud.Add'
            ],
            'listeners' => [
                'CrudJsonApi.JsonApi',
                'CrudJsonApi.Pagination',
                'Crud.RelatedModels'
            ]
        ]);
    }
    
}
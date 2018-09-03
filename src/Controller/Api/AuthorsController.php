<?php
namespace App\Controller\Api;

class AuthorsController extends ApiAppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 30,
        'fields' => [
            'id', 'person_id', 'people.informal_name'
        ],
        'sortWhitelist' => [
            'id', 'person_id', 'people.informal_name'
        ]
    ];
    
    public function initialize()
    {
        parent::initialize();
        $this->Crud->listener('relatedModels')->relatedModels(['People'], 'View');
    }
    
}
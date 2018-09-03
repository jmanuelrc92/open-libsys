<?php
namespace App\Controller\Api;

class PeopleController extends ApiAppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 30,
        'fields' => [
            'id',
            'first_name',
            'last_name'
        ],
        'sortWhitelist' => [
            'id',
            'first_name',
            'last_name'
        ]
    ];
    
    
}
<?php
namespace App\Controller\Api;

class LocationsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 30,
        'fields' => [
            'id', 'location_name', 'location_code'
        ],
        'sortWhitelist' => [
            'id', 'location_name', 'location_code'
        ]
    ];
}
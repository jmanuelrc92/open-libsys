<?php
namespace App\Controller\Api;

class PublishingHousesController extends ApiAppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 30,
        'fields' => [
            'id', 'publishing_house_name'
        ],
        'sortWhitelist' => [
            'id', 'publishing_house_name'
        ]
    ];
}
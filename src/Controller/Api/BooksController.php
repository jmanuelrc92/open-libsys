<?php
namespace App\Controller\Api;

class BooksController extends ApiAppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 30,
        'fields' => [
            'id', 'title', 'isbn_code', 'description', 'publishing_house_id', 'author_id'
        ],
        'sortWhitelist' => [
            'id', 'title', 'isbn_code', 'description', 'publishing_house_id', 'author_id'
        ]
    ];
}
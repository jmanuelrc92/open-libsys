<?php
namespace App\AppConfiguration;

class Templates
{
    const HTML_TEMPLATES = [
        'form' => [
            'inputContainer' => '<div class="form-group">{{content}}</div>'
        ],
        'breadcrumbs' => [
            'wrapper' => '<ol{{attrs}}>{{content}}</ol>',
            'item' => '<li{{attrs}}><a href="{{url}}"{{innerAttrs}}>{{icon}}{{title}}</a></li>{{separator}}',
            'itemWithoutLink' => '<li{{attrs}}><span{{innerAttrs}}>{{title}}</span></li>{{separator}}',
            'separator' => '<li{{attrs}}><span{{innerAttrs}}>{{separator}}</span></li>'
        ]
    ];
}
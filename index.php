<?php

use Pagekit\Application;

return [
    // --------------- ОСНОВНЫЕ ---------------
    'name' => 'todo', // уникальное имя, идентифицирующий модуль
    'type' => 'extension', // тип модуля

	
    'main' => function (Application $app) {
    },

	
    'autoload' => [
        'Pagekit\\todo\\' => 'src'
    ],

	
    'routes' => [
        '/todo' => [
            'name' => '@todo/admin',
            'controller' => 'Pagekit\\todo\\Controller\\TodoController'
        ],	
        '/todo/ajax' => [
            'name' => '@todo/ajax',
            'controller' => 'Pagekit\\todo\\Controller\\TodoAjaxController'
        ]
    ],

	
    'menu' => [
        'todo' => [
            'label' => 'Todo DB', // наименование
            'url' => '@todo/admin', // url-адрес модуля по умолчанию (Controller - indexAction)
            'icon' => 'todo:icon.svg' // иконка
        ]
    ],

    // --------------- СОКРАЩЕНИЯ ---------------
    'resources' => [
        'todo:' => ''
    ]
];

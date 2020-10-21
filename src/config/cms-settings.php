<?php

return[
    'contentArea' => 'content',
    'extends' => 'backend.layout',
    'prefix' => 'cms-backend-auth',
    'middleware' => [
        'cms-backend-auth', 'cms-backend-role'
    ],
    'dashboardLink' => '',
    'types'=>['1'=>'image','2'=>'text','3'=>'area']
];

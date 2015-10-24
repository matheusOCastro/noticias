<?php
 
return [
    'navigation' => [
        'default' => [
            [
                'label' => 'HOME',
                'route' => 'home',
                'action' => 'index'
                
            ],
            /*
            [
                'label' => 'Municípios',
                'route' => 'municipios',
                'action' => 'municipios'
                
            ],
            [
                'label' => 'Cadastros',
                'route' => 'cadastros',
                'pages' => [
                    [
                        'label' => 'Cad 1',
                        'route' => 'cadastros',
                        'action' => 'cadastros',
                    ],
                    [
                        'label' => 'Cad 2',
                        'route' => 'cadastros',
                        'action' => 'cadastros',
                    ],
                ]
            ],*/
            [
                'label' => 'POÇOS',
                'route' => 'pocoscadastrados',
                'action' => 'pocoscadastrados',
                
            ],
            [
                'label' => 'SOBRE',
                'route' => 'sobre',
                'action' => 'sobre'
                
            ],
        ]
    ],
];
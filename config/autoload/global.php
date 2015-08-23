<?php
 
return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'action' => 'index'
                
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
            ],
            [
                'label' => 'Consultas',
                'route' => 'consultas',
                'pages' => [
                    [
                        'label' => 'Cons 1',
                        'route' => 'consultas',
                        'action' => 'consultas',
                    ],
                    [
                        'label' => 'Cons 1',
                        'route' => 'consultas',
                        'action' => 'consultas',
                    ],
                ]
            ],
            [
                'label' => 'Sobre',
                'route' => 'sobre',
                'action' => 'sobre'
                
            ],
        ]
    ],
];
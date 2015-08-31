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
                        'label' => 'Bacia da Várzea',
                        'route' => 'consbaciavarzea',
                        'action' => 'consbaciavarzea',
                    ],
                    [
                        'label' => 'Municípios do Rio da Várzea',
                        'route' => 'consmunicipio',
                        'action' => 'consmunicipio',
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
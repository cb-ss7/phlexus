<?php declare(strict_types=1);

return [
    'application' => [
        'base_uri' => '/',
    ],
    'theme' => [
        'themes_dir' => __DIR__ . '/../themes/',
        'theme_admin' => 'phlexus-tabler-extended-admin-theme',
        'themes_dir_cache' => __DIR__ . '/../var/cache/',
    ],
    'paths' => [
        'themes' => __DIR__ . '/../themes/',
        'models' => __DIR__ . '/../src/Models/',
    ],
    'auth' => [
        'adapter' => 'model',
        'configurations' => [
            'model' => \Phlexus\Models\Users::class,
            'fields' => [
                'identity' => 'email',
                'password' => 'password',
                'id' => 'id',
            ],
        ],
        'exclude_routes' => [
            'phlexusadmin' => [
                'auth' => ['login', 'doLogin', 'logout'],
            ],
        ],
    ],
    'modules' => [
        'Landing' => [
            'className' => 'Phlexus\Modules\Landing\Module',
            'path' => __DIR__ . '/../src/Modules/Landing/Module.php',
            'router' => __DIR__ . '/../src/Modules/Landing/Config/routes.php',
        ],
        'Admin' => [
            'className' => 'Phlexus\Modules\Admin\Module',
            'path' => __DIR__ . '/../src/Modules/Admin/Module.php',
            'router' => __DIR__ . '/../src/Modules/Admin/Config/routes.php',
        ],
    ],
    'view' => [
        'engines' => [
            '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
        ]
    ],
    'db' => include_once 'database.php',
    'providers' => include_once 'providers.php',
    'security' => [
        'work_factor' => 14,
    ],
    'events' => [
        'dispatch' => \Phlexus\Events\Listeners\DispatcherListener::class,
        'dispatch:beforeDispatchLoop' => \Phlexus\Events\Listeners\AuthenticationListener::class,
    ],
];

<?php

use Hanafalah\ModuleLabRadiology\{
    Models as ModuleLabRadiologyModels,
    Commands as ModuleLabRadiologyCommands,
    Contracts
};

return [
    'namespace' => 'Hanafalah\ModuleLabRadiology',
    'app' => [
        'contracts' => [
        ],
    ],
    'commands' => [
        ModuleLabRadiologyCommands\InstallMakeCommand::class
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'database' => 'Database',
        'data' => 'Data',
        'resource' => 'Resources',
        'migration' => '../assets/database/migrations',
    ],
    'database' => [
        'models' => [
        ]
    ]
];

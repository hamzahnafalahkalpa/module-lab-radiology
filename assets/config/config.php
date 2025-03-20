<?php

use Hanafalah\ModuleLabRadiology\{
    Models as ModuleLabRadiologyModels,
    Commands as ModuleLabRadiologyCommands,
    Contracts
};

return [
    'contracts' => [
        'laboratirium'                 => Contracts\Laboratorium::class,
        'lab_visit_registration'       => Contracts\LabVisitRegistration::class,
        'module_lab_radiology'         => Contracts\ModuleLabRadiology::class,
        'radiology'                    => Contracts\Radiology::class,
        'radiology_visit_registration' => Contracts\RadiologyVisitRegistration::class,
        'sampling'                     => Contracts\Sampling::class,
        'sampling_laboratory'          => Contracts\SamplingLaboratory::class
    ],
    'commands' => [
        ModuleLabRadiologyCommands\InstallMakeCommand::class
    ],
    'database' => [
        'models' => [
            'Laboratorium' => ModuleLabRadiologyModels\LabRadiology\Laboratorium\Laboratorium::class,
            'Radiology'    => ModuleLabRadiologyModels\LabRadiology\Radiology\Radiology::class,
            'Sampling'     => ModuleLabRadiologyModels\LabRadiology\Laboratorium\Sampling\Sampling::class,
            'SamplingLaboratory' => ModuleLabRadiologyModels\LabRadiology\Laboratorium\Sampling\SamplingLaboratory::class
        ]
    ]
];

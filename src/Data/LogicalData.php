<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\ModuleLabRadiology\Contracts\Data\LogicalData as DataLogicalData;
use Hanafalah\ModuleMedicalTreatment\Data\MedicalTreatmentData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\In;

class LogicalData extends MedicalTreatmentData implements DataLogicalData
{
    #[MapInputName('type')]
    #[MapName('type')]
    #[In(['Select','Number','Text','Range'])]
    public string $type;

    #[MapInputName('rule')]
    #[MapName('rule')]
    public ?object $rule = null;
}
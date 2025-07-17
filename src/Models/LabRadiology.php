<?php

namespace Hanafalah\ModuleLabRadiology\Models;

use Hanafalah\ModuleMedicalTreatment\Models\MedicalTreatment\MedicalTreatment;

class LabRadiology extends MedicalTreatment
{
    protected $table = 'examination_stuffs';

    protected $casts = [
        'name' => 'string',
        'treatment_code' => 'string',
        'service_label_name' => 'string'
    ];

    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return [
            'medicalServiceTreatments',
            'treatment.servicePrices',
            'labSamples'
        ];
    }

    public function labSamples(){return $this->morphManyModel('LabSample','model');}
}

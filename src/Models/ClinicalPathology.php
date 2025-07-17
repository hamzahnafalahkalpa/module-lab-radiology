<?php

namespace Hanafalah\ModuleLabRadiology\Models;

use Hanafalah\ModuleLabRadiology\Resources\ClinicalPathology\{
    ViewClinicalPathology,
    ShowClinicalPathology
};
use Hanafalah\ModuleMedicalTreatment\Models\MedicalTreatment\MedicalTreatment;

class ClinicalPathology extends LabRadiology
{
    protected $table = 'examination_stuffs';
    
    protected $casts = [
        'name' => 'string',
        'treatment_code' => 'string',
        'service_label_name' => 'string',
        'clinical_pathology_code' => 'string',
    ];

    protected static function booted(): void
    {
        parent::booted();
        static::creating(function ($query) {
            $query->clinical_pathology_code ??= static::hasEncoding('CLINICAL_PATHOLOGY');
        });
    }

    public function getViewResource(){
        return ViewClinicalPathology::class;
    }

    public function getShowResource(){
        return ShowClinicalPathology::class;
    }
}

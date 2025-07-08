<?php

namespace Hanafalah\ModuleLabRadiology\Models;

use Hanafalah\ModuleLabRadiology\Resources\AnatomicalPathology\{
    ViewAnatomicalPathology,
    ShowAnatomicalPathology
};
use Hanafalah\ModuleMedicalTreatment\Models\MedicalTreatment\MedicalTreatment;

class AnatomicalPathology extends LabRadiology
{
    protected $table = 'examination_stuffs';
    
    protected $casts = [
        'name' => 'string',
        'treatment_code' => 'string',
        'service_label_name' => 'string',
        'anatomical_pathology_code' => 'string',
    ];

    protected static function booted(): void
    {
        parent::booted();
        static::creating(function ($query) {
            $query->anatomical_pathology_code ??= static::hasEncoding('ANATOMICAL_PATHOLOGY');
        });
    }

    public function getViewResource(){return ViewAnatomicalPathology::class;}
    public function getShowResource(){return ShowAnatomicalPathology::class;}
}

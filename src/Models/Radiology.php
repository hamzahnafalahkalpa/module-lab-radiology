<?php

namespace Hanafalah\ModuleLabRadiology\Models;

use Hanafalah\ModuleLabRadiology\Resources\Radiology\{
    ViewRadiology,
    ShowRadiology
};
use Hanafalah\ModuleMedicalTreatment\Models\MedicalTreatment\MedicalTreatment;

class Radiology extends LabRadiology
{
    protected $table = 'examination_stuffs';
    
    protected $casts = [
        'name' => 'string',
        'treatment_code' => 'string',
        'service_label_name' => 'string',
        'radiology_code' => 'string',
    ];

    protected static function booted(): void
    {
        parent::booted();
        static::creating(function ($query) {
            $query->radiology_code ??= static::hasEncoding('RADIOLOGY');
        });
    }

    public function getViewResource(){
        return ViewRadiology::class;
    }

    public function getShowResource(){
        return ShowRadiology::class;
    }
}

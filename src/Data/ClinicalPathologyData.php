<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\ModuleLabRadiology\Contracts\Data\ClinicalPathologyData as DataClinicalPathologyData;

class ClinicalPathologyData extends LabRadiologyData implements DataClinicalPathologyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'ClinicalPathology';
        parent::before($attributes);
    }
}
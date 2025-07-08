<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\ModuleLabRadiology\Contracts\Data\RadiologyData as DataRadiologyData;

class RadiologyData extends LabRadiologyData implements DataRadiologyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Radiology';
        parent::before($attributes);
    }
}
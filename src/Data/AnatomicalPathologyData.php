<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\ModuleLabRadiology\Contracts\Data\AnatomicalPathologyData as DataAnatomicalPathologyData;

class AnatomicalPathologyData extends LabRadiologyData implements DataAnatomicalPathologyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'AnatomicalPathology';
        parent::before($attributes);
    }
}
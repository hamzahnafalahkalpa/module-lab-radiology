<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\LaravelSupport\Data\UnicodeData;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabUnitData as DataLabUnitData;

class LabUnitData extends UnicodeData implements DataLabUnitData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'LabUnit';
        parent::before($attributes);
    }
}
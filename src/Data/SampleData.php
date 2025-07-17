<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\ModuleExamination\Data\ExaminationStuffData;
use Hanafalah\ModuleLabRadiology\Contracts\Data\SampleData as DataSampleData;

class SampleData extends ExaminationStuffData implements DataSampleData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Sample';
        parent::before($attributes);
    }
}
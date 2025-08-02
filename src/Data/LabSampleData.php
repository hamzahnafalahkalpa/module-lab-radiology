<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\LaravelSupport\Data\ModelHasRelationData;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabSampleData as DataLabSampleData;

class LabSampleData extends ModelHasRelationData implements DataLabSampleData{
    public static function before(array &$attributes){
        $attributes['relation_type'] ??= 'Sample';
    }
}
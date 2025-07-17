<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\LaravelSupport\Schemas\ModelHasRelation;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\LabSample as ContractsLabSample;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabSampleData;

class LabSample extends ModelHasRelation implements ContractsLabSample
{
    protected string $__entity = 'LabSample';
    public static $lab_sample_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'lab_sample',
            'tags'     => ['lab_sample', 'lab_sample-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreLabSample(LabSampleData $lab_sample_dto): Model{
        $lab_sample = parent::prepareStoreModelHasRelation($lab_sample_dto);
        return static::$lab_sample_model = $lab_sample;
    }
}
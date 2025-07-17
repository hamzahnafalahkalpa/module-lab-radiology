<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\LaravelSupport\Schemas\Unicode;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabUnitData;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\LabUnit as ContractsLabUnit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LabUnit extends Unicode implements ContractsLabUnit
{
    protected string $__entity = 'LabUnit';
    public static $lab_unit_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'lab_unit',
            'tags'     => ['lab_unit', 'lab_unit-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreLabUnit(LabUnitData $lab_unit_dto): Model{
        $lab_unit_model = $this->prepareStoreUnicode($lab_unit_dto);
        return static::$lab_unit_model = $lab_unit_model;
    }

    public function labUnit(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }
}
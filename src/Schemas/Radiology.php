<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts\Data\RadiologyData;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\Radiology as ContractsRadiology;

class Radiology extends LabRadiology implements ContractsRadiology
{
    protected string $__entity = 'Radiology';
    public $radiology_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'radiology',
            'tags'     => ['radiology', 'radiology-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreRadiology(RadiologyData $radiology_dto): Model{
        $radiology = parent::prepareStoreLabRadiology($radiology_dto);
        return $this->radiology_model = $radiology;
    }
}
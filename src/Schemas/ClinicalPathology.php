<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\ClinicalPathology as ContractsClinicalPathology;
use Hanafalah\ModuleLabRadiology\Contracts\Data\ClinicalPathologyData;
use Illuminate\Database\Eloquent\Builder;

class ClinicalPathology extends LabRadiology implements ContractsClinicalPathology
{
    protected string $__entity = 'ClinicalPathology';
    public static $clinical_pathology_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'clinical_pathology',
            'tags'     => ['clinical_pathology', 'clinical_pathology-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreClinicalPathology(ClinicalPathologyData $clinical_pathology_dto): Model{
        $clinical_pathology = parent::prepareStoreLabRadiology($clinical_pathology_dto);
        return static::$clinical_pathology_model = $clinical_pathology;
    }

    public function clinicalPathology(mixed $conditionals = null): Builder{
        return $this->labRadiology($conditionals);
    }
}
<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\AnatomicalPathology as ContractsAnatomicalPathology;
use Hanafalah\ModuleLabRadiology\Contracts\Data\AnatomicalPathologyData;
use Illuminate\Database\Eloquent\Builder;

class AnatomicalPathology extends LabRadiology implements ContractsAnatomicalPathology
{
    protected string $__entity = 'AnatomicalPathology';
    public static $anatomical_pathology_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'anatomical_pathology',
            'tags'     => ['anatomical_pathology', 'anatomical_pathology-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreAnatomicalPathology(AnatomicalPathologyData $anatomical_pathology_dto): Model{
        $anatomical_pathology = parent::prepareStoreLabRadiology($anatomical_pathology_dto);
        return static::$anatomical_pathology_model = $anatomical_pathology;
    }

    public function anatomicalPathology(mixed $conditionals = null): Builder{
        return $this->labRadiology($conditionals);
    }
}
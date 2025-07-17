<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\LabRadiology as ContractsLabRadiology;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabRadiologyData;
use Hanafalah\ModuleMedicalTreatment\Schemas\MedicalTreatment;
use Illuminate\Database\Eloquent\Builder;

class LabRadiology extends MedicalTreatment implements ContractsLabRadiology
{
    public static $lab_radiology;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'lab_radiology',
            'tags'     => ['lab_radiology', 'lab_radiology-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreLabRadiology(LabRadiologyData $lab_radiology_dto): Model{
        $lab_radiology = parent::prepareStoreMedicalTreatment($lab_radiology_dto);
        if (isset($lab_radiology_dto->lab_samples) && count($lab_radiology_dto->lab_samples) > 0) {
            foreach ($lab_radiology_dto->lab_samples as $lab_sample_dto) {
                $lab_sample_dto->model_type = $lab_radiology->getMorphClass();
                $lab_sample_dto->model_id   = $lab_radiology->getKey();
                $this->schemaContract('lab_sample')->prepareStoreLabSample($lab_sample_dto);
            }
        }
        return static::$lab_radiology = $lab_radiology;
    }

    public function labRadiology(mixed $conditionals = null): Builder{
        return $this->medicalTreatment($conditionals);
    }
}
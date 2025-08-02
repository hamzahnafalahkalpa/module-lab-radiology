<?php

namespace Hanafalah\ModuleLabRadiology\Data;

use Hanafalah\ModuleLabRadiology\Contracts\Data\LabRadiologyData as DataLabRadiologyData;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabUnitData;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LogicalData;
use Hanafalah\ModuleMedicalTreatment\Data\MedicalTreatmentData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class LabRadiologyData extends MedicalTreatmentData implements DataLabRadiologyData
{
    #[MapInputName('lab_unit_id')]
    #[MapName('lab_unit_id')]
    public mixed $lab_unit_id = null;

    #[MapInputName('lab_unit')]
    #[MapName('lab_unit')]
    public ?LabUnitData $lab_unit = null;

    #[MapInputName('logical')]
    #[MapName('logical')]
    public ?LogicalData $logical = null;

    #[MapInputName('lab_samples')]
    #[MapName('lab_samples')]
    #[DataCollectionOf(LabSampleData::class)]
    public ?array $lab_samples = [];

    public static function before(array &$attributes){
        $attributes['flag'] ??= 'LabRadiology';        
        parent::before($attributes);
    }

    public static function after(self $data): self{
        $new   = self::new();
        $props = &$data->props;
        
        if (isset($data->lab_unit)){
            $lab_unit = app(config('app.contracts.LabUnit'))->prepareStoreLabUnit($data->lab_unit);
            $props['lab_unit_id']   = $lab_unit->getKey();
        }else{
            $props['lab_unit_id']   = $data->lab_unit_id;
            $lab_unit = $new->LabUnitModel();
            if (isset($data->lab_unit_id)) $lab_unit = $lab_unit->findOrFail($data->lab_unit_id);
        }
        
        $props['prop_lab_unit'] = $lab_unit->toViewApi()->resolve();
        return $data;
    }
}
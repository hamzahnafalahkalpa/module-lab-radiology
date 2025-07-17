<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts\Data\LabRadiologyData;
//use Hanafalah\ModuleLabRadiology\Contracts\Data\LabRadiologyUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Hanafalah\ModuleMedicalTreatment\Contracts\Schemas\MedicalTreatment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleLabRadiology\Schemas\LabRadiology
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateLabRadiology(?LabRadiologyData $lab_radiology_dto = null)
 * @method Model prepareUpdateLabRadiology(LabRadiologyData $lab_radiology_dto)
 * @method bool deleteLabRadiology()
 * @method bool prepareDeleteLabRadiology(? array $attributes = null)
 * @method mixed getLabRadiology()
 * @method ?Model prepareShowLabRadiology(?Model $model = null, ?array $attributes = null)
 * @method array showLabRadiology(?Model $model = null)
 * @method Collection prepareViewLabRadiologyList()
 * @method array viewLabRadiologyList()
 * @method LengthAwarePaginator prepareViewLabRadiologyPaginate(PaginateData $paginate_dto)
 * @method array viewLabRadiologyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeLabRadiology(?LabRadiologyData $lab_radiology_dto = null)
 * @method Collection prepareStoreMultipleLabRadiology(array $datas)
 * @method array storeMultipleLabRadiology(array $datas)
 */

interface LabRadiology extends MedicalTreatment
{
    public function prepareStoreLabRadiology(LabRadiologyData $lab_radiology_dto): Model;
}
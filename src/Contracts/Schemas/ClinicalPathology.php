<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts\Data\ClinicalPathologyData;
//use Hanafalah\ModuleLabRadiology\Contracts\Data\ClinicalPathologyUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Hanafalah\ModuleMedicalTreatment\Contracts\Schemas\MedicalTreatment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleLabRadiology\Schemas\ClinicalPathology
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateClinicalPathology(?ClinicalPathologyData $clinical_pathology_dto = null)
 * @method Model prepareUpdateClinicalPathology(ClinicalPathologyData $clinical_pathology_dto)
 * @method bool deleteClinicalPathology()
 * @method bool prepareDeleteClinicalPathology(? array $attributes = null)
 * @method mixed getClinicalPathology()
 * @method ?Model prepareShowClinicalPathology(?Model $model = null, ?array $attributes = null)
 * @method array showClinicalPathology(?Model $model = null)
 * @method Collection prepareViewClinicalPathologyList()
 * @method array viewClinicalPathologyList()
 * @method LengthAwarePaginator prepareViewClinicalPathologyPaginate(PaginateData $paginate_dto)
 * @method array viewClinicalPathologyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeClinicalPathology(?ClinicalPathologyData $clinical_pathology_dto = null)
 * @method Collection prepareStoreMultipleClinicalPathology(array $datas)
 * @method array storeMultipleClinicalPathology(array $datas)
 */

interface ClinicalPathology extends LabRadiology
{
    public function prepareStoreClinicalPathology(ClinicalPathologyData $clinical_pathology_dto): Model;
}
<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\LaravelSupport\Contracts\Schemas\ModelHasRelation;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabSampleData;
//use Hanafalah\ModuleLabRadiology\Contracts\Data\LabSampleUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleLabRadiology\Schemas\LabSample
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateLabSample(?LabSampleData $lab_sample_dto = null)
 * @method Model prepareUpdateLabSample(LabSampleData $lab_sample_dto)
 * @method bool deleteLabSample()
 * @method bool prepareDeleteLabSample(? array $attributes = null)
 * @method mixed getLabSample()
 * @method ?Model prepareShowLabSample(?Model $model = null, ?array $attributes = null)
 * @method array showLabSample(?Model $model = null)
 * @method Collection prepareViewLabSampleList()
 * @method array viewLabSampleList()
 * @method LengthAwarePaginator prepareViewLabSamplePaginate(PaginateData $paginate_dto)
 * @method array viewLabSamplePaginate(?PaginateData $paginate_dto = null)
 * @method array storeLabSample(?LabSampleData $lab_sample_dto = null)
 * @method Collection prepareStoreMultipleLabSample(array $datas)
 * @method array storeMultipleLabSample(array $datas)
 */

interface LabSample extends ModelHasRelation
{
    public function prepareStoreLabSample(LabSampleData $lab_sample_dto): Model;
}
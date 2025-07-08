<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts\Data\RadiologyData;
//use Hanafalah\ModuleLabRadiology\Contracts\Data\RadiologyUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleLabRadiology\Schemas\Radiology
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateRadiology(?RadiologyData $radiology_dto = null)
 * @method Model prepareUpdateRadiology(RadiologyData $radiology_dto)
 * @method bool deleteRadiology()
 * @method bool prepareDeleteRadiology(? array $attributes = null)
 * @method mixed getRadiology()
 * @method ?Model prepareShowRadiology(?Model $model = null, ?array $attributes = null)
 * @method array showRadiology(?Model $model = null)
 * @method Collection prepareViewRadiologyList()
 * @method array viewRadiologyList()
 * @method LengthAwarePaginator prepareViewRadiologyPaginate(PaginateData $paginate_dto)
 * @method array viewRadiologyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeRadiology(?RadiologyData $radiology_dto = null)
 * @method Collection prepareStoreMultipleRadiology(array $datas)
 * @method array storeMultipleRadiology(array $datas)
 */

interface Radiology extends LabRadiology
{
    public function prepareStoreRadiology(RadiologyData $radiology_dto): Model;
}
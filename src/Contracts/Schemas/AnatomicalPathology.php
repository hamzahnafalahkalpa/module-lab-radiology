<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts\Data\AnatomicalPathologyData;
//use Hanafalah\ModuleLabRadiology\Contracts\Data\AnatomicalPathologyUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleLabRadiology\Schemas\AnatomicalPathology
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateAnatomicalPathology(?AnatomicalPathologyData $anatomical_pathology_dto = null)
 * @method Model prepareUpdateAnatomicalPathology(AnatomicalPathologyData $anatomical_pathology_dto)
 * @method bool deleteAnatomicalPathology()
 * @method bool prepareDeleteAnatomicalPathology(? array $attributes = null)
 * @method mixed getAnatomicalPathology()
 * @method ?Model prepareShowAnatomicalPathology(?Model $model = null, ?array $attributes = null)
 * @method array showAnatomicalPathology(?Model $model = null)
 * @method Collection prepareViewAnatomicalPathologyList()
 * @method array viewAnatomicalPathologyList()
 * @method LengthAwarePaginator prepareViewAnatomicalPathologyPaginate(PaginateData $paginate_dto)
 * @method array viewAnatomicalPathologyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeAnatomicalPathology(?AnatomicalPathologyData $anatomical_pathology_dto = null)
 * @method Collection prepareStoreMultipleAnatomicalPathology(array $datas)
 * @method array storeMultipleAnatomicalPathology(array $datas)
 */

interface AnatomicalPathology extends LabRadiology
{
    public function prepareStoreAnatomicalPathology(AnatomicalPathologyData $anatomical_pathology_dto): Model;
}
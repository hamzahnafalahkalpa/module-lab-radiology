<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\LaravelSupport\Contracts\Schemas\Unicode;
use Hanafalah\ModuleLabRadiology\Contracts\Data\LabUnitData;
//use Hanafalah\ModuleLabRadiology\Contracts\Data\LabUnitUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleLabRadiology\Schemas\LabUnit
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateLabUnit(?LabUnitData $lab_unit_dto = null)
 * @method Model prepareUpdateLabUnit(LabUnitData $lab_unit_dto)
 * @method bool deleteLabUnit()
 * @method bool prepareDeleteLabUnit(? array $attributes = null)
 * @method mixed getLabUnit()
 * @method ?Model prepareShowLabUnit(?Model $model = null, ?array $attributes = null)
 * @method array showLabUnit(?Model $model = null)
 * @method Collection prepareViewLabUnitList()
 * @method array viewLabUnitList()
 * @method LengthAwarePaginator prepareViewLabUnitPaginate(PaginateData $paginate_dto)
 * @method array viewLabUnitPaginate(?PaginateData $paginate_dto = null)
 * @method Model prepareStoreLabUnit(LabUnitData $lab_unit_dto)
 * @method array storeLabUnit(?LabUnitData $lab_unit_dto = null)
 * @method Collection prepareStoreMultipleLabUnit(array $datas)
 * @method array storeMultipleLabUnit(array $datas)
 */

interface LabUnit extends Unicode{
    public function prepareStoreLabUnit(LabUnitData $lab_unit_dto): Model;
    public function labUnit(mixed $conditionals = null): Builder;
}
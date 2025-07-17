<?php

namespace Hanafalah\ModuleLabRadiology\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Schemas\ExaminationStuff;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Sample
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteSample()
 * @method bool prepareDeleteSample(? array $attributes = null)
 * @method mixed getSample()
 * @method ?Model prepareShowSample(?Model $model = null, ?array $attributes = null)
 * @method array showSample(?Model $model = null)
 * @method Collection prepareViewSampleList()
 * @method array viewSampleList()
 * @method LengthAwarePaginator prepareViewSamplePaginate(PaginateData $paginate_dto)
 * @method array viewSamplePaginate(?PaginateData $paginate_dto = null)
 * @method array storeSample(?SampleData $sample_dto = null)
 * @method Builder sample(mixed $conditionals = null)
 */
interface Sample extends ExaminationStuff
{
}

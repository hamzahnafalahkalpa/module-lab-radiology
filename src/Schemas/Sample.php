<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleExamination\Schemas\ExaminationStuff;
use Hanafalah\ModuleLabRadiology\Contracts\Data\SampleData;
use Hanafalah\ModuleLabRadiology\Contracts\Schemas\Sample as ContractSample;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Sample extends ExaminationStuff implements ContractSample
{
    protected string $__entity = 'Sample';
    public $sample_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'sample',
            'tags'     => ['sample', 'sample-index'],
            'duration' => 24*7
        ]
    ];

    public function prepareStoreSample(SampleData $sample_dto): Model{     
        $sample_model = $this->prepareStoreExaminationStuff($sample_dto);       
        return $this->sample_model = $sample_model;
    }

    public function sample(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}

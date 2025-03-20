<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SamplingLaboratory extends Laboratorium implements Contracts\SamplingLaboratory
{
    protected array $__guard   = ['id'];
    protected array $__add     = ['name', 'laboratorium_id', 'sampling_id'];
    protected string $__entity = 'SamplingLaboratory';

    public function booting(): self
    {
        static::$__class = $this;
        static::$__model = $this->{$this->__entity . "Model"}();
        return $this;
    }

    public function samplingLaboratory(mixed $conditions = null): Builder
    {
        return $this->getModel()->conditionals($conditions);
    }

    public function addOrChange(?array $attributes = []): self
    {
        $this->updateOrCreate($attributes);
        return $this;
    }
}

<?php

namespace Gilanggustina\ModuleLabRadiology\Schemas;

use Gilanggustina\ModuleLabRadiology\Contracts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Hanafalah\LaravelSupport\Supports\PackageManagement;

class Sampling extends PackageManagement implements Contracts\Sampling
{
    protected array $__guard   = ['id', 'name'];
    protected array $__add     = ['name'];
    protected string $__entity = 'Sampling';
    public function booting(): self
    {
        static::$__class = $this;
        static::$__model = $this->{$this->__entity . "Model"}();
        return $this;
    }

    public function sampling(mixed $conditions = null): Builder
    {
        return $this->getModel()->conditionals($conditions);
    }

    public function getSampleLaboratories(mixed $conditionals = null)
    {
        return $this->sampling(function ($query) {
            if (request()->has('search_name')) {
                $query->whereLike('name', request()->name);
            }
        })->get();
    }

    public function addOrChange(?array $attributes = []): self
    {
        $this->updateOrCreate($attributes);
        return $this;
    }
}

<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Hanafalah\ModuleTransaction\Schemas\PriceComponent;

class Laboratorium extends PackageManagement implements Contracts\Laboratorium
{
    protected array $__guard   = ['id', 'parent_id'];
    protected array $__add     = ['name', 'root', 'root_index', 'parent_id'];
    protected string $__entity = 'Laboratorium';
    public static $lab_model;

    public function booting(): self
    {
        static::$__class = $this;
        static::$__model = $this->{$this->__entity . "Model"}();
        return $this;
    }

    protected array $__morphs = [
        'sample_datas'      => SamplingLaboratory::class,
        'tariff_components' => PriceComponent::class
    ];

    public function laboratorium(mixed $conditions = null): Builder
    {
        return $this->LaboratoriumModel()->conditionals($conditions);
    }

    public function getLaboratories(mixed $conditionals = null): Collection
    {
        return $this->laboratorium($conditionals)->with('childrenRekursif')->get();
    }

    public function addOrChange(?array $attributes = []): self
    {
        $lab = $this->updateOrCreate($attributes);
        static::$lab_model = $lab;
        if (isset($attributes['price'])) {
            $lab->load('treatment');
            if (isset($lab->treatment)) {
                $treatment = $lab->treatment;
                $treatment->price = $attributes['price'];
                $treatment->save();
            }
        }
        return $this;
    }
}

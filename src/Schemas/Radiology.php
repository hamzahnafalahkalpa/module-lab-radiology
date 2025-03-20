<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleLabRadiology\Contracts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Hanafalah\ModuleTransaction\Schemas\PriceComponent;

class Radiology extends PackageManagement implements Contracts\Radiology
{
    protected array $__guard   = ['id', 'parent_id'];
    protected array $__add     = ['name', 'root', 'root_index', 'parent_id'];
    protected string $__entity = 'Radiology';
    public static $radiology_model;

    public function booting(): self
    {
        static::$__class = $this;
        static::$__model = $this->{$this->__entity . "Model"}();
        return $this;
    }

    protected array $__morphs = [
        'tariff_components' => PriceComponent::class
    ];

    public function radiology(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->RadiologyModel()->conditionals($conditionals);
    }

    public function getRadiologies(mixed $conditionals = null): Collection
    {
        return $this->radiology(function ($query) use ($conditionals) {
            $query->conditionals($conditionals);
        })->with('childrenRekursif')->get();
    }

    public function addOrChange(?array $attributes = []): self
    {
        $radiology = $this->updateOrCreate($attributes);
        static::$radiology_model = $radiology;
        if (isset($attributes['price'])) {
            $radiology->load('treatment');
            if (isset($radiology->treatment)) {
                $treatment = $radiology->treatment;
                $treatment->price = $attributes['price'];
                $treatment->save();
            }
        }
        return $this;
    }
}

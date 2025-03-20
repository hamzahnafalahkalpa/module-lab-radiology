<?php

namespace Gilanggustina\ModuleLabRadiology\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Zahzah\LaravelSupport\Contracts\DataManagement;

interface Sampling extends DataManagement
{
  public function sampling(mixed $conditions = null): Builder;
  public function getSampleLaboratories(mixed $conditionals = null);
  public function addOrChange(? array $attributes=[]) :self;
  public function booting(): self;

}
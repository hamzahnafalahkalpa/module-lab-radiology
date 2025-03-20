<?php

namespace Gilanggustina\ModuleLabRadiology\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface SamplingLaboratory extends Laboratorium
{
  public function samplingLaboratory(mixed $conditions = null): Builder;
  public function booting(): self;
}
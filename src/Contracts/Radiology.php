<?php

namespace Hanafalah\ModuleLabRadiology\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface Radiology extends ModuleLabRadiology
{
  public function getRadiologies(mixed $conditionals = null): Collection;
  public function booting(): self;
}

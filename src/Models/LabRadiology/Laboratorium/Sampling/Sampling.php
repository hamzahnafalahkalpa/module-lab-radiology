<?php

namespace Gilanggustina\ModuleLabRadiology\Models\LabRadiology\Laboratorium\Sampling;

use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;

class Sampling extends BaseModel
{
  use HasProps, SoftDeletes;
  protected $list = ['id', 'name', 'props'];
  protected $show = ['props'];
  protected $table = "samplings";
}

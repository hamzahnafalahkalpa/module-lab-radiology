<?php

namespace Gilanggustina\ModuleLabRadiology\Models\LabRadiology\Laboratorium\Sampling;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;

class Sampling extends BaseModel{
  use HasProps, SoftDeletes;
  protected $list = ['id','name','props'];
  protected $show = ['props'];
  protected $table = "samplings";
}
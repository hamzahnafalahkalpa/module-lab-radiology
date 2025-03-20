<?php

namespace Gilanggustina\ModuleLabRadiology\Models\LabRadiology\Laboratorium\Sampling;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;

class SamplingLaboratory extends BaseModel{
  use HasProps, SoftDeletes;
  protected $list = ['id','name','laboratorium_id','sampling_id','props'];
  protected $show = ['props'];

  //EIGER SECTION
  public function laboratorium(){return $this->belongsToModel('Laboratorium');}
  public function sampling(){return $this->belongsToModel('Sampling');}
  // END EAGER SECTION

  
}
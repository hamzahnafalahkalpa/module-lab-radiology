<?php

namespace Gilanggustina\ModuleLabRadiology\Models\LabRadiology\Radiology;

use Gilanggustina\ModuleLabRadiology\Models\LabRadiology\LabRadiology;

class Radiology extends LabRadiology{  
  protected static function booted(): void{
    parent::booted();
    static::creating(function($query){
      if (!isset($query->radiology_code)){
        $query->radiology_code = static::hasEncoding('RADIOLOGY');
      }
    });
  }

  public function treatment(){return $this->morphOneModel('Treatment','reference');}
  public function childrenRekursif(){return $this->hasManyModel('Radiology','parent_id')->with('childrenRekursif')->orderBy('root','asc');}
  public function priceComponent(){return $this->morphOneModel("PriceComponent","model");}
  public function priceComponents(){return $this->morphManyModel("PriceComponent","model");}
}

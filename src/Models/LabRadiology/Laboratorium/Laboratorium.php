<?php

namespace Hanafalah\ModuleLabRadiology\Models\LabRadiology\Laboratorium;

use Hanafalah\ModuleLabRadiology\Models\LabRadiology\LabRadiology;

class Laboratorium extends LabRadiology
{
  protected $table = "laboratories";

  protected static function booted(): void
  {
    parent::booted();
    static::creating(function ($query) {
      if (!isset($query->laboratory_code)) {
        $query->laboratory_code = static::hasEncoding('LABORATORY');
      }
    });
  }


  //EIGER SECTION
  public function treatment()
  {
    return $this->morphOneModel('Treatment', 'reference');
  }
  public function childrenRekursif()
  {
    return $this->hasManyModel('Laboratorium', 'parent_id')->with('childrenRekursif')->orderBy('root', 'asc');
  }
  public function samplingLaboratory()
  {
    return $this->hasOneModel('SamplingLaboratory', 'laboratorium_id');
  }
  public function samplingLaboratories()
  {
    return $this->hasManyModel('SamplingLaboratory', 'laboratorium_id');
  }
  public function parent()
  {
    return $this->hasOneModel('Laboratorium', 'id', 'parent_id');
  }
  public function priceComponent()
  {
    return $this->morphOneModel("PriceComponent", "model");
  }
  public function priceComponents()
  {
    return $this->morphManyModel("PriceComponent", "model");
  }
  //ENDEIGER SECTION
}

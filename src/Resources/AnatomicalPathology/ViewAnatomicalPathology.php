<?php

namespace Hanafalah\ModuleLabRadiology\Resources\AnatomicalPathology;

use Hanafalah\ModuleMedicalTreatment\Resources\MedicalTreatment\ViewMedicalTreatment;

class ViewAnatomicalPathology extends ViewMedicalTreatment
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $arr = [
      'as_label'         => $this->as_label,
      'unit_id'          => $this->unit_id,
      'unit'             => $this->prop_unit,
      'logical'          => $this->logical
    ];
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}

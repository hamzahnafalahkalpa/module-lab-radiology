<?php

namespace Hanafalah\ModuleLabRadiology\Resources\Radiology;

use Hanafalah\ModuleMedicalTreatment\Resources\MedicalTreatment\ViewMedicalTreatment;

class ViewRadiology extends ViewMedicalTreatment
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
    ];
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}

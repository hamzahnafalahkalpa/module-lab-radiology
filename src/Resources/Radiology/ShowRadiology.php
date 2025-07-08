<?php

namespace Hanafalah\ModuleLabRadiology\Resources\Radiology;

use Hanafalah\ModuleMedicalTreatment\Resources\MedicalTreatment\ShowMedicalTreatment;

class ShowRadiology extends ViewRadiology
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
    ];
    $show = $this->resolveNow(new ShowMedicalTreatment($this));
    $arr = $this->mergeArray(parent::toArray($request),$show,$arr);
    return $arr;
  }
}

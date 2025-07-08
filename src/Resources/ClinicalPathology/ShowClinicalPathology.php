<?php

namespace Hanafalah\ModuleLabRadiology\Resources\ClinicalPathology;

use Hanafalah\ModuleMedicalTreatment\Resources\MedicalTreatment\ShowMedicalTreatment;

class ShowClinicalPathology extends ViewClinicalPathology
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
      'lab_samples' => $this->relationValidation("labSamples", function () {
          return $this->labSamples->transform(function ($labSample) {
              return $labSample->toViewApi();
          });
      })
    ];
    $show = $this->resolveNow(new ShowMedicalTreatment($this));
    $arr = $this->mergeArray(parent::toArray($request),$show,$arr);
    return $arr;
  }
}

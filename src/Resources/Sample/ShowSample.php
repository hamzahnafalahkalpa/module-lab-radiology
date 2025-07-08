<?php

namespace Hanafalah\ModuleLabRadiology\Resources\Sample;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ShowExaminationStuff;

class ShowSample extends ViewSample
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $arr = [
            'container' => $this->container,
            'preservative' => $this->preservative,
            'volume_min_ml' => $this->volume_min_ml,
            'storage_condition' => $this->storage_condition,
            'transport_condition' => $this->transport_condition,
            'transport_media' => $this->transport_media,
            'transport_time_limit' => $this->transport_time_limit,
            'validity_period' => $this->validity_period,
            'priority' => $this->priority,
            'fasting_required' => $this->fasting_required,
            'hazardous' => $this->hazardous,
            'biohazard_level' => $this->biohazard_level,
            'aliquot_allowed' => $this->aliquot_allowed,
            'barcode_prefix' => $this->barcode_prefix,
            'notes' => $this->notes,
        ];
        // $show = $this->resolveNow(new ShowExaminationStuff($this));
        // $arr = $this->mergeArray(parent::toArray($request),$show, $arr);
        $arr = $this->mergeArray(parent::toArray($request), $arr);
        return $arr;
    }
}

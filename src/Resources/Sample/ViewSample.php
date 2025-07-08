<?php

namespace Hanafalah\ModuleLabRadiology\Resources\Sample;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ViewExaminationStuff;

class ViewSample extends ViewExaminationStuff
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
            'id'                => $this->id,
            'name'              => $this->name,
            'label'             => $this->label,
            'ordering'          => $this->ordering,
            'loinc_code'        => $this->loinc_code,
            'collection_method' => $this->collection_method,
            'specimen_type'     => $this->specimen_type,
            'appearance'        => $this->appearance
        ];
        // $arr = $this->mergeArray(parent::toArray($request), $arr);
        return $arr;
    }
}

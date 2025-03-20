<?php

namespace Gilanggustina\ModuleLabRadiology\Resources\LabVisitRegistration;

use Hanafalah\ModulePatient\Resources\VisitRegistration\ShowVisitRegistration;

class ShowLabVisitRegistration extends ShowVisitRegistration
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $arr = [];
        $arr = $this->mergeArray(parent::toArray($request), $arr);

        return $arr;
    }
}

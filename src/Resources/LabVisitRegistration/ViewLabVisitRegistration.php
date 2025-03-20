<?php

namespace Hanafalah\ModuleLabRadiology\Resources\LabVisitRegistration;

use Hanafalah\ModulePatient\Resources\VisitRegistration\ViewVisitRegistration;

class ViewLabVisitRegistration extends ViewVisitRegistration
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

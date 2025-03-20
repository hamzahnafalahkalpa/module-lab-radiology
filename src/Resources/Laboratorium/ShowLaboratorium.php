<?php

namespace Gilanggustina\ModuleLabRadiology\Resources\Laboratorium;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ShowLaboratorium extends ViewLaboratorium
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
            'parent' => $this->relationValidation('parent', function () {
                $parent = $this->parent;
                return new ShowLaboratorium($parent);
            }),
            'sample_datas' => $this->relationValidation("samplingLaboratories", function () {
                $samplings = $this->samplingLaboratories;
                return $samplings->transform(function ($sampling) {
                    $sampling->load("sampling");
                    return [
                        "id"   => $sampling->sampling_id,
                        "name" => $sampling->sampling->name
                    ];
                });
            })
        ];
        $arr = array_merge(parent::toArray($request), $arr);

        return $arr;
    }
}

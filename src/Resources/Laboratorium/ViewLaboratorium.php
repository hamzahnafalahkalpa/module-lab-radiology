<?php

namespace Gilanggustina\ModuleLabRadiology\Resources\Laboratorium;

use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewLaboratorium extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) :array
    {
        $arr = [
            'id'               => $this->id,
            'name'             => $this->name,
            'laboratory_code'  => $this->laboratory_code,
            'service_id'       => $this->service_id,
            'parent_id'        => $this->parent_id,
            'root'             => $this->root,
            'is_label'         => $this->is_label ?? null,
            'unit_value'       => $this->unit_value ?? null,
            'component_type'   => $this->component_type ?? null,
            'logical_operator' => $this->logical_operator ?? null,
            'reference_value'  => $this->reference_value ?? null,
            'childs' => $this->when($this->relationLoaded('childrenRekursif') && isset($this->childrenRekursif), function () {
                return $this->childrenRekursif->transform(function ($item) {
                    $item->load(["treatment","priceComponents"]);
                    return new ViewLaboratorium($item);
                });
            }),
            'treatment' => $this->relationValidation('treatment',function(){
                $treatment = $this->treatment;
                return [
                    'id' => $treatment->id,
                    'price' => $treatment->price ?? 0
                ];
            }),
            'tariff_components' => $this->relationValidation('priceComponents', function() {
                $priceComponents = $this->priceComponents;
                return $priceComponents->transform(function($priceComponent) {
                    return  [
                        "id"    => $priceComponent->tariff_component_id,
                        "price" => $priceComponent->price ?? $this->treatment->price ?? 0,
                        "name"  => $priceComponent->tariffComponent->name ?? "Name is invalid",
                    ];
                });
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        
        return $arr;
    }
}

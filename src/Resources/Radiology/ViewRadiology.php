<?php

namespace Gilanggustina\ModuleLabRadiology\Resources\Radiology;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewRadiology extends ApiResource
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
            'id'              => $this->id,
            'name'            => $this->name,
            'radiology_code'  => $this->radiology_code,
            'parent_id'       => $this->parent_id,
            'root'            => $this->root,
            'is_label'        => $this->is_label,
            'template'        => $this->template ?? null,
            'childs'          => $this->when($this->relationLoaded('childrenRekursif'), function () {
                return $this->childrenRekursif->transform(function ($item) {
                    $item->load(["treatment", "priceComponents"]);
                    return new ViewRadiology($item);
                });
            }),
            'treatment' => $this->relationValidation('treatment', function () {
                $treatment = $this->treatment;
                return [
                    'id'    => $treatment->id,
                    'price' => $treatment->price ?? 0
                ];
            }),
            'tariff_components' => $this->relationValidation('priceComponents', function () {
                $priceComponents = $this->priceComponents;
                return $priceComponents->transform(function ($priceComponent) {
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

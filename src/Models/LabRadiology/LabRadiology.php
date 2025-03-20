<?php

namespace Hanafalah\ModuleLabRadiology\Models\LabRadiology;

use Hanafalah\ModuleService\Concerns\HasServiceItem;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Hanafalah\ModuleTreatment\Concerns\HasTreatment;
use Hanafalah\ModuleLabRadiology\Enums\LabRadiology\Status;

class LabRadiology extends BaseModel
{
  use HasProps, SoftDeletes, HasServiceItem, HasTreatment;

  protected $list = ['id', 'parent_id', 'name', 'root', 'root_index', 'status', 'props'];
  protected $show = ['parent_id', 'props'];

  protected static function booted(): void
  {
    parent::booted();
    static::addGlobalScope(function ($query) {
      $query->where('status', Status::ACTIVE->value);
    });
    static::creating(function ($query) {
      if (!isset($query->status)) {
        $query->status = Status::ACTIVE->value;
      }
    });
    static::created(function ($query) {
      if (!isset($query->root_index)) $query->root_index = $query->id + 1;
      $query->save();
    });
    static::updated(function ($query) {
      if ($query->isDirty('status')) {
        $model = app($query::class);
        $model->whereLike('root', $query->root . '.%')
          ->whereNotNull('deleted_at')
          ->update([
            'status' => $query->status
          ]);
      }
    });
  }

  public function treatment()
  {
    return $this->morphOneModel('Treatment', 'reference');
  }
  public function childrenRekursif()
  {
    return $this->hasManyModel('Radiology', 'parent_id')->with('childrenRekursif')->orderBy('root', 'asc');
  }
  public function priceComponent()
  {
    return $this->morphOneModel("PriceComponent", "model");
  }
  public function priceComponents()
  {
    return $this->morphManyModel("PriceComponent", "model");
  }
}

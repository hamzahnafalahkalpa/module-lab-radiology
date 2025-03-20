<?php

namespace Gilanggustina\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleMedicService\Enums\MedicServiceFlag;
use Gilanggustina\ModuleLabRadiology\Contracts\RadiologyVisitRegistration as ContractsRadiologyVisitRegistration;
use Gilanggustina\ModuleLabRadiology\Resources\RadiologyVisitRegistration\{
    ShowRadiologyVisitRegistration,
    ViewRadiologyVisitRegistration
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModulePatient\Schemas\VisitRegistration;

class RadiologyVisitRegistration extends VisitRegistration implements ContractsRadiologyVisitRegistration
{
    protected string $__entity = 'RadiologyVisitRegistration';
    public static $radiology_visit_model;

    protected array $__resources = [
        'view' => ViewRadiologyVisitRegistration::class,
        'show' => ShowRadiologyVisitRegistration::class
    ];

    protected array $__cache = [
        'index' => [
            'name'     => 'radiology-registration',
            'tags'     => ['radiology-registration', 'radiology-registration-index'],
            'duration' => 60 * 12
        ]
    ];

    public function prepareStoreRadiologyVisitRegistration(?array $attributes = null): Model
    {
        request()->merge([
            'medic_service_id' => $this->getMedicService(MedicServiceFlag::RADIOLOGY->value)->getKey()
        ]);
        $attributes ??= request()->all();
        $visit_registration = parent::prepareStoreVisitRegistration($attributes);
        return $visit_registration;
    }

    public function storeRadiologyVisitRegistration(): array
    {
        return $this->transaction(function () {
            return $this->showVisitRegistration($this->prepareStoreRadiologyVisitRegistration());
        });
    }

    public function radiologyVisitRegistration(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->RadiologyVisitRegistrationModel()->conditionals($conditionals);
    }
}

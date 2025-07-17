<?php

namespace Hanafalah\ModuleLabRadiology\Schemas;

use Hanafalah\ModuleMedicService\Enums\Label;
use Hanafalah\ModuleLabRadiology\Contracts\LabVisitRegistration as ContractsLabVisitRegistration;
use Hanafalah\ModuleLabRadiology\Resources\LabVisitRegistration\ShowLabVisitRegistration;
use Hanafalah\ModuleLabRadiology\Resources\LabVisitRegistration\ViewLabVisitRegistration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModulePatient\Schemas\VisitRegistration;

class LabVisitRegistration extends VisitRegistration implements ContractsLabVisitRegistration
{
    protected string $__entity = 'LabVisitRegistration';
    public static $lab_visit_model;

    protected array $__resources = [
        'view' => ViewLabVisitRegistration::class,
        'show' => ShowLabVisitRegistration::class
    ];

    protected array $__cache = [
        'index' => [
            'name'     => 'lab-registration',
            'tags'     => ['lab-registration', 'lab-registration-index'],
            'duration' => 60 * 12
        ]
    ];

    public function prepareStoreRadiologyVisitRegistration(?array $attributes = null): Model
    {
        request()->merge([
            'medic_service_id' => $this->getMedicService(Label::LABORATORY->value)->getKey()
        ]);
        $attributes ??= request()->all();
        $visit_registration = parent::prepareStoreVisitRegistration($attributes);
        return $visit_registration;
    }

    public function storeLabVisitRegistration(): array
    {
        return $this->transaction(function () {
            return $this->showVisitRegistration($this->prepareStoreLabVisitRegistration());
        });
    }

    public function labVisitRegistration(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->LabVisitRegistrationModel()->conditionals($conditionals);
    }
}

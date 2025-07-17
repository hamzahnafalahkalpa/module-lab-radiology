<?php

namespace Hanafalah\ModuleLabRadiology\Models;

use Hanafalah\LaravelSupport\Models\Relation\ModelHasRelation;
use Hanafalah\ModuleLabRadiology\Resources\LabSample\{
    ViewLabSample,
    ShowLabSample
};

class LabSample extends ModelHasRelation
{
    protected $table = 'model_has_relations';

    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return [];
    }

    public function getViewResource(){return ViewLabSample::class;}
    public function getShowResource(){return ShowLabSample::class;}
}

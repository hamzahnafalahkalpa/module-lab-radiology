<?php

namespace Hanafalah\ModuleLabRadiology\Models;

use Hanafalah\ModuleLabRadiology\Resources\Sample\{ViewSample, ShowSample};
use Hanafalah\ModuleExamination\Models\ExaminationStuff;

class Sample extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){return ViewSample::class;}
    public function getShowResource(){return ShowSample::class;}
}

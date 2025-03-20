<?php

namespace Gilanggustina\ModuleLabRadiology\Enums\LabRadiology;

enum Status: string{
    case DRAFT    = 'DRAFT';
    case ACTIVE   = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
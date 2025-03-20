<?php

namespace Gilanggustina\ModuleLabRadiology\Supports;

use Zahzah\LaravelSupport\Supports\PackageManagement;

class BaseModuleLabRadiology extends PackageManagement{
    /** @var array */
    protected $__module_lab_radiology_config = [];

    /**
     * A description of the entire PHP function.
     *
     * @param Container $app The Container instance
     * @throws Exception description of exception
     * @return void
     */
    public function __construct(){
        $this->setConfig('module-lab-radiology',$this->__module_lab_radiology_config);
    }    
}   
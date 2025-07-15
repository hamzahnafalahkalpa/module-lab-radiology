<?php

namespace Hanafalah\ModuleLabRadiology\Commands;

use Hanafalah\ModuleLabRadiology\Commands\EnvironmentCommand;

class InstallMakeCommand extends EnvironmentCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module-lab-radiology:install';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used for initial installation of module lab radiology';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $provider = 'Hanafalah\ModuleLabRadiology\ModuleLabRadiologyServiceProvider';

        $this->comment('Installing Module Lab Radiology...');
        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'config'
        ]);
        $this->info('✔️  Created config/module-lab-radiology.php');

        $this->callSilent('vendor:publish', [
            '--provider' => $provider,
            '--tag'      => 'migrations'
        ]);
        $this->info('✔️  Created migrations');
        $this->comment('hanafalah/module-lab-radiology installed successfully.');
    }
}

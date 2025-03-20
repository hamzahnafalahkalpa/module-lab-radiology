<?php

namespace Gilanggustina\ModuleLabRadiology\Commands;

use Gilanggustina\ModuleLabRadiology\Commands\EnvironmentCommand;

class InstallMakeCommand extends EnvironmentCommand{
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
        $provider = 'Gilanggustina\ModuleLabRadiology\ModuleLabRadiologyServiceProvider';

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
        
        $migrations = $this->setMigrationBasePath(database_path('migrations'))->canMigrate();
        $this->callSilent('migrate', [
            '--path' => $migrations
        ]);
        $this->info('✔️  App table migrated');

        $this->comment('gilanggustina/module-lab-radiology installed successfully.');
    }
}
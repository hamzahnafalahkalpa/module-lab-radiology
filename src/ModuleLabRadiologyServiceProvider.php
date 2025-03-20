<?php

declare(strict_types=1);

namespace Gilanggustina\ModuleLabRadiology;

use Hanafalah\LaravelSupport\Providers\BaseServiceProvider;
use Gilanggustina\ModuleLabRadiology\Schemas\{
    Laboratorium,
    Radiology,
    Sampling,
    SamplingLaboratory,
    RadiologyVisitRegistration,
    LabVisitRegistration
};

class ModuleLabRadiologyServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return $this
     */
    public function register()
    {
        $this->registerMainClass(ModuleLabRadiology::class)
            ->registerCommandService(Providers\CommandServiceProvider::class)
            ->registers([
                '*',
                'Services' => function () {
                    $this->binds([
                        Contracts\ModuleLabRadiology::class => new ModuleLabRadiology(),
                        Contracts\Laboratorium::class => Laboratorium::class,
                        Contracts\Radiology::class => Radiology::class,
                        Contracts\Sampling::class => Sampling::class,
                        Contracts\SamplingLaboratory::class => SamplingLaboratory::class,
                        Contracts\LabVisitRegistration::class => LabVisitRegistration::class,
                        Contracts\RadiologyVisitRegistration::class => RadiologyVisitRegistration::class,
                    ]);
                }
            ]);
    }

    /**
     * Get the base path of the package.
     *
     * @return string
     */
    protected function dir(): string
    {
        return __DIR__ . '/';
    }

    protected function migrationPath(string $path = ''): string
    {
        return database_path($path);
    }
}

<?php

namespace PropaySystems\Utilities;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PropaySystems\Utilities\Commands\UtilitiesCommand;

class UtilitiesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('utilities')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasCommand(UtilitiesCommand::class);
    }
}

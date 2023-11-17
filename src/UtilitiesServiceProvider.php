<?php

namespace PropaySystems\Utilities;

use PropaySystems\Utilities\Commands\UtilitiesCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

<?php

namespace RupeshDai\nepalimobileoperator\tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use YourVendor\NepalMobileOperators\NepalMobileOperatorsServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            NepalMobileOperatorsServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'NepalMobileOperators' => \YourVendor\NepalMobileOperators\Facades\NepalMobileOperators::class,
        ];
    }
}

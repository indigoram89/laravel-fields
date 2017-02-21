<?php

namespace Indigoram89\Fields\Test;

use Indigoram89\Fields\FieldsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        \Eloquent::unguard();

        $this->artisan('migrate', ['--database' => 'testbench']);

        \Schema::create('test_models', function ($table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * After completion of the tests.
     *
     * @return void
     */
    public function tearDown()
    {
        \Schema::drop('test_models');
    }

    /**
     * Load your package service providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            FieldsServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}

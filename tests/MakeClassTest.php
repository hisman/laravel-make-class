<?php

namespace Hisman\MakeClass\Test;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Hisman\MakeClass\MakeClassServiceProvider;
use Illuminate\Filesystem\Filesystem;

class MakeClassTest extends BaseTestCase
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return \Hisman\MakeClass\MakeClassServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [MakeClassServiceProvider::class];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->files = new Filesystem();
    }

    /**
     * Test for creating a new class from artisan command.
     *
     * @test
     */
    public function testCreateClass()
    {
        $this->artisan('make:class', ['name' => 'TestClass', '--force' => true])
             ->expectsOutput('Class created successfully.');
        
        $filepath = $this->app['path'].'/Classes/TestClass.php';
        
        $this->assertTrue($this->files->exists($filepath));
        $this->assertContains('class TestClass', $this->files->get($filepath));
    }
}

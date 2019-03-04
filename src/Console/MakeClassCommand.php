<?php

namespace Hisman\MakeClass\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeClassCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = '/stubs/class.stub';

        if ($this->option('constructor')) {
            $stub = '/stubs/class.constructor.stub';
        }

        return __DIR__.$stub;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the class already exists'],
            ['constructor', 'c', InputOption::VALUE_NONE, 'Create a new class with constructor'],
        ];
    }
}

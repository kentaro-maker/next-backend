<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\GeneratorCommand;

class LighthouseObjectTypeCommand extends GeneratorCommand
{
    protected $signature = 'lighthouse:type {name}';
    protected $description = 'Create a new Lighthouse GraphQL Object Type class';
    protected $type = 'Object Type';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/typeResolver.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\GraphQL\Types';
    }
}

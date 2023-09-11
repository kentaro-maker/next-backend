<?php

namespace App\Providers;

use GraphQL\Type\Definition\Type;
use Illuminate\Support\ServiceProvider;
use GraphQL\Type\Definition\ObjectType;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use App\Console\Commands\LighthouseObjectTypeCommand;
use App\GraphQL\Types\Authenticated;
use App\GraphQL\Types\IncorrectCredentialsError;
use App\GraphQL\Types\InvalidEmailError;


class GraphQLServiceProvider extends ServiceProvider
{
    /**
     * @var array<int, class-string<\Illuminate\Console\Command>>
     */
    public const COMMANDS = [
        LighthouseObjectTypeCommand::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(self::COMMANDS);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(TypeRegistry $typeRegistry): void
    {
       
    }
}

<?php

namespace App\GraphQL\Queries;

final class Greet
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    // public function __invoke($_, array $args)
    // {
    //     // TODO implement the resolver
    // }
    public function __invoke($rootValue, array $args): string
    {
        return "Hello, {$args['name']}!";
    }
}

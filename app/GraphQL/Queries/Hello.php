<?php

namespace App\GraphQL\Queries;

final class Hello
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    // public function __invoke($_, array $args)
    public function __invoke($_, array $args): string
    {
        return 'world!';
    }
}

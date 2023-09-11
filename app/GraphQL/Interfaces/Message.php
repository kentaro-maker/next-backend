<?php

namespace App\GraphQL\Interfaces;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Nuwave\Lighthouse\Schema\TypeRegistry;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class Message
{
    /**
     * The type registry.
     *
     * @var \Nuwave\Lighthouse\Schema\TypeRegistry
     */
    protected $typeRegistry;

    public function __construct(TypeRegistry $typeRegistry)
    {
        $this->typeRegistry = $typeRegistry;
    }

    /**
     * Decide which GraphQL type a resolved value has.
     *
     * @param  mixed  $rootValue The value that was resolved by the field. Usually an Eloquent model.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo
     * @return \GraphQL\Type\Definition\Type
     */
    public function __invoke($rootValue, GraphQLContext $context, ResolveInfo $resolveInfo): Type
    {
        $message = new InterfaceType([
            'name' => 'Message',
            'description' => 'Response Message',
            'fields' => [
                'message' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'The result of request',
                ],
            ],
            'resolveType' => function ($value): ObjectType {
                switch ($value->type ?? null) {
                    case 'human': return MyTypes::human();
                    case 'droid': return MyTypes::droid();
                    default: throw new Exception("Unknownkk");
                }
            }
        ]);
        return $message;
    }
}

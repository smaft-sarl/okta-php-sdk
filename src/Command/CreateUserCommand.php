<?php

namespace Smaft\OktaSdk\Command;

use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Operation;
use Smaft\OktaSdk\Model\Profile;
use Smaft\OktaSdk\Model\User;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class CreateUserCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    protected function createOperation()
    {
        return new Operation([
            'name' => __CLASS__,
            'httpMethod' => 'POST',
            'uri' => 'users',
            'responseClass' => User::class,
            'parameters' => [
                'profile' => [
                    'required' => true,
                    'type' => 'object',
                    'instanceof' => Profile::class,
                    'location' => 'json',
                ],
                'activate' => [
                    'required' => false,
                    'type' => 'boolean',
                    'default' => true,
                    'location' => 'query',
                    'filters' => [
                        [
                            'method' => __CLASS__ . '::convertBoolean',
                            'args' => ['@value']
                        ]
                    ]
                ],
            ],
        ]);
    }

    public static function convertBoolean($value)
    {
        return $value ? 'true' : 'false';
    }
}

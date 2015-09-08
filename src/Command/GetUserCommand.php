<?php

namespace Smaft\OktaSdk\Command;

use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Operation;
use Smaft\OktaSdk\Model\User;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class GetUserCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    protected function createOperation()
    {
        return new Operation([
            'name' => __CLASS__,
            'httpMethod' => 'GET',
            'uri' => 'users/{id}',
            'responseClass' => User::class,
            'parameters' => [
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
            ],
        ]);
    }
}

<?php

namespace Smaft\OktaSdk\Command;

use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Operation;
use Smaft\OktaSdk\Model\Credentials;
use Smaft\OktaSdk\Model\Profile;
use Smaft\OktaSdk\Model\User;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class UpdateUserCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    protected function createOperation()
    {
        return new Operation([
            'name' => __CLASS__,
            'httpMethod' => 'PUT',
            'uri' => 'users/{id}',
            'responseClass' => User::class,
            'parameters' => [
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'profile' => [
                    'required' => false,
                    'type' => 'object',
                    'instanceof' => Profile::class,
                    'location' => 'json',
                ],
                'credentials' => [
                    'required' => false,
                    'type' => 'object',
                    'instanceof' => Credentials::class,
                    'location' => 'json',
                ],
                'user' => [
                    'required' => false,
                    'type' => 'object',
                    'instanceof' => User::class,
                ],
            ],
        ]);
    }

    protected function init()
    {
        if (null !== ($user = $this->get('user'))) {
            if (null === $this->get('id')
                && null !== $user->getId()
            ) {
                $this->set('id', $user->getId());
            }
            if (null === $this->get('profile')
                && null !== $user->getProfile()
            ) {
                $this->set('profile', $user->getProfile());
            }
            if (null === $this->get('credentials')
                && null !== $user->getCredentials()
            ) {
                $this->set('credentials', $user->getCredentials());
            }
        }
    }
}

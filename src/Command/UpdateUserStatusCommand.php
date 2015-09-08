<?php

namespace Smaft\OktaSdk\Command;

use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Operation;
use Smaft\OktaSdk\Model\User;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class UpdateUserStatusCommand extends OperationCommand
{
    const ACTION_ACTIVATE = 'activate';
    const ACTION_DEACTIVATE = 'deactivate';
    const ACTION_RESET_PASSWORD = 'resetPassword';
    const ACTION_EXPIRE_PASSWORD = 'expirePassword';
    const ACTION_RESET_FACTORS = 'resetFactors';
    const ACTION_UNLOCK = 'unlock';

    /**
     * {@inheritdoc}
     */
    protected function createOperation()
    {
        return new Operation([
            'name' => __CLASS__,
            'httpMethod' => 'POST',
            'uri' => 'users/{id}/lifecycle/{action}',
            'parameters' => [
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                ],
                'action' => [
                    'required' => true,
                    'type' => 'string',
                    'enum' => [
                        self::ACTION_ACTIVATE,
                        self::ACTION_DEACTIVATE,
                        self::ACTION_RESET_PASSWORD,
                        self::ACTION_EXPIRE_PASSWORD,
                        self::ACTION_RESET_FACTORS,
                        self::ACTION_UNLOCK,
                    ],
                    'location' => 'uri',
                ],
                'status' => [
                    'required' => false,
                    'type' => 'string',
                    'enum' => [
                        User::STATUS_ACTIVE,
                        User::STATUS_DEPROVISIONED,
                        User::STATUS_RECOVERY,
                        User::STATUS_PASSWORD_EXPIRED,
                    ],
                    'location' => 'json',
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
        }

        if (null !== ($status = $this->get('status'))) {
            if (null === $this->get('action')) {
                if (User::STATUS_ACTIVE === $status) {
                    $this->set('action', self::ACTION_ACTIVATE);
                }
                if (User::STATUS_DEPROVISIONED === $status) {
                    $this->set('action', self::ACTION_DEACTIVATE);
                }
                if (User::STATUS_RECOVERY === $status) {
                    $this->set('action', self::ACTION_RESET_PASSWORD);
                }
                if (User::STATUS_PASSWORD_EXPIRED === $status) {
                    $this->set('action', self::ACTION_EXPIRE_PASSWORD);
                }
            }
        }
    }
}

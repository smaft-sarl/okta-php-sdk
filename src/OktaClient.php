<?php

namespace Smaft\OktaSdk;

use Guzzle\Service\Client;
use Guzzle\Service\Command\Factory\MapFactory;
use Smaft\OktaSdk\Command\CreateUserCommand;
use Smaft\OktaSdk\Command\GetUserCommand;
use Smaft\OktaSdk\Command\ListUserCommand;
use Smaft\OktaSdk\Command\UpdateUserCommand;
use Smaft\OktaSdk\Command\UpdateUserStatusCommand;
use Smaft\OktaSdk\Model\Credentials;
use Smaft\OktaSdk\Model\Profile;
use Smaft\OktaSdk\Model\User;
use Smaft\OktaSdk\Model\Collection;
use Smaft\OktaSdk\Plugin\ResponseErrorPlugin;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class OktaClient extends Client
{
    public function __construct(array $config = [])
    {
        $config = static::resolveAndValidateConfig($config);

        parent::__construct(
            '{protocol}://{host}/api/v1/',
            $config
        );

        $this->setDefaultOption(
            'headers/Authorization',
            sprintf('SSWS %s', $config['api_key'])
        );

        $this->addSubscriber(new ResponseErrorPlugin());

        $this->setCommandFactory(new MapFactory([
            'CreateUser' => CreateUserCommand::class,
            'GetUser' => GetUserCommand::class,
            'UpdateUser' => UpdateUserCommand::class,
            'UpdateUserStatus' => UpdateUserStatusCommand::class,
            'ListUser' => ListUserCommand::class,
        ]));
    }

    public static function create($config = [])
    {
        return new static($config);
    }

    private static function resolveAndValidateConfig(array $config)
    {
        $configuration = new Configuration();

        return $configuration->process($config);
    }

    /**
     * @param  Profile      $profile
     * @param  boolean|true $activate
     * @return User
     */
    public function createUser(Profile $profile, Credentials $credentials = null, $activate = true)
    {
        return $this
            ->getCommand('CreateUser', [
                'profile' => $profile,
                'credentials' => $credentials,
                'activate' => $activate,
            ])
            ->execute()
        ;
    }

    /**
     * @param  string $id
     * @return User
     */
    public function getUser($id)
    {
        return $this
            ->getCommand('GetUser', ['id' => $id])
            ->execute()
        ;
    }

    /**
     * @param  User $user
     * @return User
     */
    public function updateUser(User $user)
    {
        return $this
            ->getCommand('UpdateUser', ['user' => $user])
            ->execute()
        ;
    }

    /**
     * @param  string           $id
     * @param  Profile|null     $profile
     * @param  Credentials|null $credentials
     * @return User
     */
    public function updatePartialUser($id, Profile $profile = null, Credentials $credentials = null)
    {
        return $this
            ->getCommand('UpdateUserPartial', [
                'id' => $id,
                'profile' => $profile,
                'credentials' => $credentials,
            ])
            ->execute()
        ;
    }

    /**
     * @param  string $id
     * @param  string $action
     * @return array          An empty array
     */
    public function updateUserStatus($id, $action)
    {
        return $this
            ->getCommand('UpdateUserStatus', [
                'action' => $action,
                'id' => $id,
            ])
            ->execute()
        ;
    }

    /**
     * @param string|null        $q
     * @param string|null        $filter
     * @param int                $limit
     * @return Collection|User[]
     */
    public function listUser($q = null, $filter = null, $limit = 200)
    {
        return $this
            ->getCommand('ListUser', [
                'q' => $q,
                'filter' => $filter,
                'limit' => $limit,
            ])
            ->execute()
        ;
    }

    /**
     * @param  Collection        $collection
     * @return Collection|User[]
     */
    public function getUserCollectionNext(Collection $collection)
    {
        $links = $collection->getLinks();

        if (!array_key_exists('next', $links)) {
            throw new \InvalidArgumentException('The collection has no next link.');
        }

        return $this
            ->getCommand('ListUser', [
                'url' => $links['next'],
            ])
            ->execute()
        ;
    }
}

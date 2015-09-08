<?php

use Guzzle\Plugin\Log\LogPlugin;
use Smaft\OktaSdk\Command\UpdateUserStatusCommand;
use Smaft\OktaSdk\Model\Profile;
use Smaft\OktaSdk\OktaClient;

require __DIR__.'/../vendor/autoload.php';

$client = new OktaClient(require __DIR__ . '/../config.php');
$client->addSubscriber(LogPlugin::getDebugPlugin());

$email = sprintf('isaac.brock%s@example.com', time());
$profile = new Profile();
$profile->setFirstName('Isaac');
$profile->setLastName('Brock');
$profile->setEmail($email);
$profile->setLogin($email);
$profile->setMobilePhone('555-415-1337');

$user = $client->createUser($profile);

var_dump($user);

$user2 = $client->getUser($user->getId());

var_dump($user2);

$user2->getProfile()->setFirstName($user2->getProfile()->getFirstName() . ' UPDATE');

$user3 = $client->updateUser($user2);

var_dump($user3);

$result = $client->updateUserStatus($user3->getId(), UpdateUserStatusCommand::ACTION_DEACTIVATE);

var_dump($result);

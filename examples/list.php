<?php

use Guzzle\Plugin\Log\LogPlugin;
use Smaft\OktaSdk\OktaClient;

require __DIR__.'/../vendor/autoload.php';

$client = new OktaClient(require __DIR__ . '/../config.php');
$client->addSubscriber(LogPlugin::getDebugPlugin());

$users = null;
do {
    if (null === $users) {
        $users = $client->listUser(null, null, 2);
    } else {
        $users = $client->getUserCollectionNext($users);
    }

    foreach ($users as $user) {
        var_dump($user->getId());
    }
} while ($users->hasNextLink());

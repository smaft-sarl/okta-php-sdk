<?php

use Guzzle\Plugin\Log\LogPlugin;
use Smaft\OktaSdk\Exception\ApiErrorException;
use Smaft\OktaSdk\Model\Profile;
use Smaft\OktaSdk\OktaClient;

require __DIR__.'/../vendor/autoload.php';

$client = new OktaClient(require __DIR__ . '/../config.php');
$client->addSubscriber(LogPlugin::getDebugPlugin());

$email = 'isaac.brock';
$profile = new Profile();
$profile->setFirstName('Isaac');
$profile->setLastName('Brock');
$profile->setEmail($email);
$profile->setLogin($email);
$profile->setMobilePhone('555-415-1337');

$command = $client->getCommand('CreateUser', [
    'profile' => $profile,
    'activate' => true,
]);
try {
    $user = $command->execute();
} catch (ApiErrorException $e) {
    var_dump($e->getErrorId(), $e->getErrorCode(), $e->getErrorLink(), $e->getErrorSummary(), $e->getErrorCauses());

    throw $e;
}

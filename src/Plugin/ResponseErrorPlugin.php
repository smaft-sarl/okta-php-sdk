<?php

namespace Smaft\OktaSdk\Plugin;

use Guzzle\Common\Event;
use Smaft\OktaSdk\Exception\ApiErrorException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class ResponseErrorPlugin implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return ['request.error' => ['onRequestError', -1]];
    }

    public function onRequestError(Event $event)
    {
        $response = $event['response'];

        try {
            $json = $response->json();
        } catch (\Exception $e) {
            return;
        }

        $errorCode = array_key_exists('errorCode', $json) ? $json['errorCode'] : null;

        if (null === $errorCode) {
            return;
        }

        $errorSummary = array_key_exists('errorSummary', $json) ? $json['errorSummary'] : null;
        $errorLink = array_key_exists('errorLink', $json) ? $json['errorLink'] : null;
        $errorId = array_key_exists('errorId', $json) ? $json['errorId'] : null;
        $errorCauses = array_key_exists('errorCauses', $json) ? $json['errorCauses'] : null;
        if (is_array($errorCauses)) {
            $errorCauses = array_map(function (array $cause) {
                return array_key_exists('errorSummary', $cause) ? $cause['errorSummary'] : null;
            }, $errorCauses);
        }

        throw new ApiErrorException(
            $errorSummary,
            $errorCode,
            $errorLink,
            $errorId,
            $errorCauses
        );
    }
}

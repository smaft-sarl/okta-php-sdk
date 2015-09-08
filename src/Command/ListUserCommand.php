<?php

namespace Smaft\OktaSdk\Command;

use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Operation;
use Smaft\OktaSdk\Model\User;
use Smaft\OktaSdk\Model\Collection;
use Smaft\OktaSdk\Parser\LinkParser;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class ListUserCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    protected function createOperation()
    {
        return new Operation([
            'name' => __CLASS__,
            'httpMethod' => 'GET',
            'uri' => 'users',
            'responseClass' => User::class,
            'parameters' => [
                'limit' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'query',
                    'default' => 200,
                ],
                'after' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'query',
                ],
                'q' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'query',
                ],
                'filter' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'query',
                ],
                'url' => [
                    'required' => false,
                    'type' => 'string',
                ],
            ],
        ]);
    }

    public function prepare()
    {
        $request = parent::prepare();

        if (null !== ($url = $this->get('url'))) {
            $request->setUrl($url);
        }

        return $request;
    }

    protected function process()
    {
        parent::process();

        $response = $this->request->getResponse();

        $links = [];
        if ($response->hasHeader('Link')) {
            $linkParser = new LinkParser();
            $links = $linkParser->parseLinkHeader($response->getHeader('Link'));
        }

        $this->result = new Collection(
            $this->result,
            $links,
            $this->getClient()
        );
    }
}

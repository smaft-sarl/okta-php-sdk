<?php

namespace Smaft\OktaSdk\Model;

use Guzzle\Common\ToArrayInterface;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Command\ResponseClassInterface;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
abstract class BaseModel implements ToArrayInterface, ResponseClassInterface
{
    public function __construct(array $properties = [])
    {
        if (empty($properties)) {
            return;
        }

        $properties = array_intersect_key($properties, get_class_vars(get_class($this)));
        $properties = $this->parse($properties);

        foreach ($properties as $property => $value) {
            $this->$property = $value;
        }
    }

    public static function fromCommand(OperationCommand $command)
    {
        $json = $command->getResponse()->json();

        // support collections
        if (array_key_exists(0, $json)) {
            return array_map(function (array $properties) {
                return new static($properties);
            }, $json);
        }

        return new static($json);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function parse(array $properties)
    {
        foreach ($properties as $key => $value) {
            if (!is_string($value) || strlen($value) < 10) {
                continue;
            }

            // \DateTime::ISO8601 doesn't support milliseconds ...
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:s.uO', $value);

            if ($date instanceof \DateTime) {
                $properties[$key] = $date;
            }
        }

        return $properties;
    }
}

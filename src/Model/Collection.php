<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Collection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $objects;

    /**
     * @var array
     */
    private $links;

    public function __construct($objects = [], array $links = [])
    {
        $this->objects = $objects;
        $this->links = $links;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->objects);
    }

    public function hasNextLink()
    {
        return array_key_exists('next', $this->links);
    }

    public function getLinks()
    {
        return $this->links;
    }
}

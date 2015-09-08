<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Provider extends BaseModel
{
    const TYPE_OKTA = 'OKTA';
    const TYPE_ACTIVE_DIRECTORY = 'ACTIVE_DIRECTORY';
    const TYPE_LDAP = 'LDAP';
    const TYPE_FEDERATION = 'FEDERATION';

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

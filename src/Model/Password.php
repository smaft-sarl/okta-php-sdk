<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Password extends BaseModel
{
    /**
     * Length: - 40
     *
     * @var string|null
     */
    protected $value;

    /**
     * @return null|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null|string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Credentials extends BaseModel
{
    /**
     * @var Password|null
     */
    protected $password;

    /**
     * @var RecoveryQuestion|null
     */
    protected $recovery_question;

    /**
     * @var Provider
     */
    protected $provider;

    public function parse(array $properties)
    {
        $properties = parent::parse($properties);

        if (array_key_exists('password', $properties)
            && is_array($properties['password'])
        ) {
            $properties['password'] = new Password($properties['password']);
        }

        if (array_key_exists('recovery_question', $properties)
            && is_array($properties['recovery_question'])
        ) {
            $properties['recovery_question'] = new RecoveryQuestion($properties['recovery_question']);
        }

        if (array_key_exists('provider', $properties)
            && is_array($properties['provider'])
        ) {
            $properties['provider'] = new Provider($properties['provider']);
        }

        return $properties;
    }

    /**
     * @return null|Password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null|Password $password
     */
    public function setPassword(Password $password = null)
    {
        $this->password = $password;
    }

    /**
     * @return null|RecoveryQuestion
     */
    public function getRecoveryQuestion()
    {
        return $this->recovery_question;
    }

    /**
     * @param null|RecoveryQuestion $recovery_question
     */
    public function setRecoveryQuestion(RecoveryQuestion $recovery_question = null)
    {
        $this->recovery_question = $recovery_question;
    }

    /**
     * @return Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param Provider $provider
     */
    public function setProvider(Provider $provider)
    {
        $this->provider = $provider;
    }
}

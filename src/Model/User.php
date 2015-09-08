<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class User extends BaseModel
{
    const STATUS_STAGED = 'STAGED';
    const STATUS_PROVISIONED = 'PROVISIONED';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_RECOVERY = 'RECOVERY';
    const STATUS_LOCKED_OUT = 'LOCKED_OUT';
    const STATUS_PASSWORD_EXPIRED = 'PASSWORD_EXPIRED';
    const STATUS_DEPROVISIONED = 'DEPROVISIONED';

    /**
     * Unique
     *
     * @var string unique key for user
     */
    protected $id;

    /**
     * @var string current status of user
     */
    protected $status;

    /**
     * @var \DateTime timestamp when user was created
     */
    protected $created;

    /**
     * @var \DateTime timestamp when transition to ACTIVE status completed
     */
    protected $activated;

    /**
     * @var \DateTime|null timestamp when status last changed
     */
    protected $statusChanged;

    /**
     * @var \DateTime|null timestamp of last login
     */
    protected $lastLogin;

    /**
     * @var \DateTime timestamp when user was last updated
     */
    protected $lastUpdated;

    /**
     * @var \DateTime|null timestamp when password last changed
     */
    protected $passwordChanged;

    /**
     * @var string|null target status of an in-progress asynchronous status transition
     */
    protected $transitioningToStatus;

    /**
     * @var Profile user profile properties
     */
    protected $profile;

    /**
     * @var Credentials user’s primary authentication and recovery credentials
     */
    protected $credentials;

    public function parse(array $properties)
    {
        $properties = parent::parse($properties);

        if (array_key_exists('profile', $properties)
            && is_array($properties['profile'])
        ) {
            $properties['profile'] = new Profile($properties['profile']);
        }

        if (array_key_exists('credentials', $properties)
            && is_array($properties['credentials'])
        ) {
            $properties['credentials'] = new Credentials($properties['credentials']);
        }

        return $properties;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * @param \DateTime $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

    /**
     * @return \DateTime|null
     */
    public function getStatusChanged()
    {
        return $this->statusChanged;
    }

    /**
     * @param \DateTime|null $statusChanged
     */
    public function setStatusChanged($statusChanged)
    {
        $this->statusChanged = $statusChanged;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime|null $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return \DateTime|null
     */
    public function getPasswordChanged()
    {
        return $this->passwordChanged;
    }

    /**
     * @param \DateTime|null $passwordChanged
     */
    public function setPasswordChanged($passwordChanged)
    {
        $this->passwordChanged = $passwordChanged;
    }

    /**
     * @return null|string
     */
    public function getTransitioningToStatus()
    {
        return $this->transitioningToStatus;
    }

    /**
     * @param null|string $transitioningToStatus
     */
    public function setTransitioningToStatus($transitioningToStatus)
    {
        $this->transitioningToStatus = $transitioningToStatus;
    }

    /**
     * @return Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param Profile $profile
     */
    public function setProfile(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return Credentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }
}

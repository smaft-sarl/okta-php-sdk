<?php

namespace Smaft\OktaSdk\Exception;

use Exception;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class ApiErrorException extends \RuntimeException
{
    /**
     * @var int
     */
    private $errorCode;

    /**
     * @var string
     */
    private $errorLink;
    /**
     * @var string
     */
    private $errorId;

    /**
     * @var array
     */
    private $errorCauses;

    public function __construct(
        $message = '',
        $errorCode,
        $errorLink,
        $errorId,
        array $errorCauses = [],
        Exception $previous = null
    ) {
        parent::__construct($message, 0, $previous);

        $this->errorCode = $errorCode;
        $this->errorLink = $errorLink;
        $this->errorId = $errorId;
        $this->errorCauses = $errorCauses;
    }

    public function getErrorSummary()
    {
        return $this->getMessage();
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorLink()
    {
        return $this->errorLink;
    }

    /**
     * @return string
     */
    public function getErrorId()
    {
        return $this->errorId;
    }

    /**
     * @return array
     */
    public function getErrorCauses()
    {
        return $this->errorCauses;
    }
}

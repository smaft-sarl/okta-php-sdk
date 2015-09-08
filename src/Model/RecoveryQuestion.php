<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class RecoveryQuestion extends BaseModel
{
    /**
     * Length: 1 - 100
     *
     * @var string|null
     */
    protected $question;

    /**
     * Length: 1 - 100
     *
     * @var string|null
     */
    protected $answer;

    /**
     * @return null|string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param null|string $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return null|string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param null|string $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
}

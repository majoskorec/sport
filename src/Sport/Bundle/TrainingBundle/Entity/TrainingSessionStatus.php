<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sport_training_session_status")
 * @ORM\Entity
 */
class TrainingSessionStatus
{

    const STATUS_REGISTRATION = 'registration';
    const STATUS_WILL_BE = 'will-be';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_DONE = 'done';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=16)
     * @ORM\Id
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32)
     */
    protected $name;

// -- php app/console doctrine:generate:entities SportTrainingBundle:TrainingSessionStatus --

    /**
     * Set code
     *
     * @param string $code
     *
     * @return TrainingSessionStatus
     */
    public function setCode( $code )
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TrainingSessionStatus
     */
    public function setName( $name )
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}

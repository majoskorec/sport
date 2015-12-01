<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sport_session_presence_status")
 * @ORM\Entity
 */
class SessionPresenceStatus
{

    const STATUS_NONE = 'none';
    const STATUS_GOING = 'going';
    const STATUS_NOT_GOING = 'not-going';
    const STATUS_LATER = 'later';

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

// -- php app/console doctrine:generate:entities SportTrainingBundle:SessionPresenceStatus --

    /**
     * Set code
     *
     * @param string $code
     *
     * @return SessionPresenceStatus
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
     * @return SessionPresenceStatus
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

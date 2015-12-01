<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sport_session_presence")
 * @ORM\Entity
 */
class SessionPresence
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var TrainingSession
     *
     * @ORM\ManyToOne(targetEntity="TrainingSession", inversedBy="presence")
     * @ORM\JoinColumn(name="training_session_id", referencedColumnName="id", nullable=false)
     */
    protected $trainingSession;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    protected $username;

    /**
     * @var SessionPresenceStatus
     *
     * @ORM\ManyToOne(targetEntity="SessionPresenceStatus")
     * @ORM\JoinColumn(name="session_presence_status_code", referencedColumnName="code", nullable=false)
     */
    protected $essionPresenceStatus;

// -- php app/console doctrine:generate:entities SportTrainingBundle:SessionPresence --

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return SessionPresence
     */
    public function setUsername( $username )
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set trainingSession
     *
     * @param \Sport\Bundle\TrainingBundle\Entity\TrainingSession $trainingSession
     *
     * @return SessionPresence
     */
    public function setTrainingSession( \Sport\Bundle\TrainingBundle\Entity\TrainingSession $trainingSession )
    {
        $this->trainingSession = $trainingSession;

        return $this;
    }

    /**
     * Get trainingSession
     *
     * @return \Sport\Bundle\TrainingBundle\Entity\TrainingSession
     */
    public function getTrainingSession()
    {
        return $this->trainingSession;
    }

    /**
     * Set essionPresenceStatus
     *
     * @param \Sport\Bundle\TrainingBundle\Entity\SessionPresenceStatus $essionPresenceStatus
     *
     * @return SessionPresence
     */
    public function setEssionPresenceStatus( \Sport\Bundle\TrainingBundle\Entity\SessionPresenceStatus $essionPresenceStatus )
    {
        $this->essionPresenceStatus = $essionPresenceStatus;

        return $this;
    }

    /**
     * Get essionPresenceStatus
     *
     * @return \Sport\Bundle\TrainingBundle\Entity\SessionPresenceStatus
     */
    public function getEssionPresenceStatus()
    {
        return $this->essionPresenceStatus;
    }

}

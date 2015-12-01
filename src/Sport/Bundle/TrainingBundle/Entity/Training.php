<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sport_training")
 * @ORM\Entity
 */
class Training
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="weekday", type="integer", nullable=false)
     */
    protected $weekday;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255)
     */
    protected $place;

    /**
     * @var TrainingSession[]
     *
     * @ORM\OneToMany(targetEntity="TrainingSession", mappedBy="training")
     */
    protected $sessions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduled_time", type="time", nullable=false)
     */
    protected $scheduledTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="valid_from", type="date", nullable=false)
     */
    protected $validFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="valid_to", type="date", nullable=false)
     */
    protected $validTo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    protected $active;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->active = true;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActiveSessions()
    {
        return $this->getSessions()->filter( function(TrainingSession $trainingSession) {
                    return $trainingSession->getActive();
                } );
    }

// -- php app/console doctrine:generate:entities SportTrainingBundle:Training --

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
     * Set name
     *
     * @param string $name
     *
     * @return Training
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

    /**
     * Set weekday
     *
     * @param integer $weekday
     *
     * @return Training
     */
    public function setWeekday( $weekday )
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
     * Get weekday
     *
     * @return integer
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * Set place
     *
     * @param string $place
     *
     * @return Training
     */
    public function setPlace( $place )
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set scheduledTime
     *
     * @param \DateTime $scheduledTime
     *
     * @return Training
     */
    public function setScheduledTime( $scheduledTime )
    {
        $this->scheduledTime = $scheduledTime;

        return $this;
    }

    /**
     * Get scheduledTime
     *
     * @return \DateTime
     */
    public function getScheduledTime()
    {
        return $this->scheduledTime;
    }

    /**
     * Set validFrom
     *
     * @param \DateTime $validFrom
     *
     * @return Training
     */
    public function setValidFrom( $validFrom )
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    /**
     * Get validFrom
     *
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * Set validTo
     *
     * @param \DateTime $validTo
     *
     * @return Training
     */
    public function setValidTo( $validTo )
    {
        $this->validTo = $validTo;

        return $this;
    }

    /**
     * Get validTo
     *
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Training
     */
    public function setActive( $active )
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add session
     *
     * @param \Sport\Bundle\TrainingBundle\Entity\TrainingSession $session
     *
     * @return Training
     */
    public function addSession( \Sport\Bundle\TrainingBundle\Entity\TrainingSession $session )
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * Remove session
     *
     * @param \Sport\Bundle\TrainingBundle\Entity\TrainingSession $session
     */
    public function removeSession( \Sport\Bundle\TrainingBundle\Entity\TrainingSession $session )
    {
        $this->sessions->removeElement( $session );
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

}

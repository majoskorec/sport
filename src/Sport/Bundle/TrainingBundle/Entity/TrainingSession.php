<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="sport_training_session")
 * @ORM\Entity
 */
class TrainingSession
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
     * @var Training
     *
     * @ORM\ManyToOne(targetEntity="Training", inversedBy="sessions")
     * @ORM\JoinColumn(name="training_id", referencedColumnName="id", nullable=false)
     */
    protected $training;

    /**
     * @var TrainingSessionStatus
     *
     * @ORM\ManyToOne(targetEntity="TrainingSessionStatus")
     * @ORM\JoinColumn(name="training_session_code", referencedColumnName="code", nullable=false)
     */
    protected $trainingSessionStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduled_date", type="datetime", nullable=false)
     */
    protected $scheduledDate;

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
        $this->active = true;
    }

// -- php app/console doctrine:generate:entities SportTrainingBundle:TrainingSession --

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
     * Set scheduledDate
     *
     * @param \DateTime $scheduledDate
     *
     * @return TrainingSession
     */
    public function setScheduledDate( $scheduledDate )
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    /**
     * Get scheduledDate
     *
     * @return \DateTime
     */
    public function getScheduledDate()
    {
        return $this->scheduledDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return TrainingSession
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
     * Set training
     *
     * @param \Sport\Bundle\TrainingBundle\Entity\Training $training
     *
     * @return TrainingSession
     */
    public function setTraining( \Sport\Bundle\TrainingBundle\Entity\Training $training )
    {
        $this->training = $training;

        return $this;
    }

    /**
     * Get training
     *
     * @return \Sport\Bundle\TrainingBundle\Entity\Training
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * Set trainingSessionStatus
     *
     * @param \Sport\Bundle\TrainingBundle\Entity\TrainingSessionStatus $trainingSessionStatus
     *
     * @return TrainingSession
     */
    public function setTrainingSessionStatus( \Sport\Bundle\TrainingBundle\Entity\TrainingSessionStatus $trainingSessionStatus )
    {
        $this->trainingSessionStatus = $trainingSessionStatus;

        return $this;
    }

    /**
     * Get trainingSessionStatus
     *
     * @return \Sport\Bundle\TrainingBundle\Entity\TrainingSessionStatus
     */
    public function getTrainingSessionStatus()
    {
        return $this->trainingSessionStatus;
    }

}

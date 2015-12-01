<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingSessionNotification
 *
 * ORM\Table(name="sport_training_session_notification")
 * ORM\Entity
 */
class TrainingSessionNotification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="trainingSession", type="object")
     */
    private $trainingSession;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="notification", type="object")
     */
    private $notification;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;


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
     * Set trainingSession
     *
     * @param \stdClass $trainingSession
     *
     * @return TrainingSessionNotification
     */
    public function setTrainingSession($trainingSession)
    {
        $this->trainingSession = $trainingSession;

        return $this;
    }

    /**
     * Get trainingSession
     *
     * @return \stdClass
     */
    public function getTrainingSession()
    {
        return $this->trainingSession;
    }

    /**
     * Set notification
     *
     * @param \stdClass $notification
     *
     * @return TrainingSessionNotification
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return \stdClass
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return TrainingSessionNotification
     */
    public function setActive($active)
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
}


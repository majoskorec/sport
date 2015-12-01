<?php

namespace Sport\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;

/**
 * Player
 *
 * @ORM\Table(name="sport_player")
 * @ORM\Entity
 */
class Player extends User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}


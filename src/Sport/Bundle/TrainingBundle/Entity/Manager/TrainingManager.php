<?php

namespace Sport\Bundle\TrainingBundle\Entity\Manager;

use Doctrine\ORM\EntityManager;
use Sport\Bundle\TrainingBundle\Entity\Training;

class TrainingManager
{

    /** @var EntityManager */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct( EntityManager $em )
    {
        $this->em = $em;
    }

    /**
     * @return Training
     */
    public function find( $id )
    {
        return $this->em->createQueryBuilder()
                        ->select( 't' )
                        ->from( 'SportTrainingBundle:Training', 't' )
                        ->where( 't.active = 1' )
                        ->andWhere( 't.id = :id' )
                        ->setParameter( 'id', $id )
                        ->getQuery()
                        ->getSingleResult();
    }

    /**
     * @return Training[]
     */
    public function getList()
    {
        return $this->em->createQueryBuilder()
                        ->select( 't' )
                        ->from( 'SportTrainingBundle:Training', 't' )
                        ->where( 't.active = 1' )
                        ->orderBy( 't.validFrom', 'DESC' )
                        ->getQuery()
                        ->getResult();
    }

    /**
     * @param \DateTime $date
     * @return Training[]
     */
    public function getTrainingsByDate( \DateTime $date )
    {
        return $this->em->createQueryBuilder()
                        ->select( 't' )
                        ->from( 'SportTrainingBundle:Training', 't' )
                        ->leftJoin( 't.sessions', 's', 'with', 's.training = t.id and DATE(s.scheduledDate) = DATE(:date)' )
                        ->where( 't.active = 1' )
                        ->andWhere( 't.weekday = :weekday' )
                        ->andWhere( ':date between t.validFrom and t.validTo' )
                        ->andWhere( 's.id is null' )
                        ->setParameter( 'weekday', $date->format( 'w' ) )
                        ->setParameter( 'date', $date )
                        ->getQuery()
                        ->getResult();
    }

}

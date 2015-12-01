<?php

namespace Sport\Bundle\TrainingBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Sport\Bundle\TrainingBundle\Entity\Manager\TrainingManager;
use Sport\Bundle\TrainingBundle\Entity\Training;
use Sport\Bundle\TrainingBundle\Entity\TrainingSession;
use Sport\Bundle\TrainingBundle\Entity\TrainingSessionStatus;
use Doctrine\ORM\EntityManager;

class TrainingSessionCreatorCommand extends ContainerAwareCommand
{

    const DEFAULT_INTERVAL = 2;

    /** @var TrainingSessionStatus */
    protected $statusRregistration = null;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName( 'sport:training:session-create' )
                ->setDescription( 'Create next training sessions' )
                ->addOption(
                        'interval', null, InputOption::VALUE_OPTIONAL, 'Interval in days to create Training Session', self::DEFAULT_INTERVAL
                )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute( InputInterface $input, OutputInterface $output )
    {
        $interval = $input->getOption( 'interval' );
        $output->writeln( sprintf( "<info>Creating Training Sessions for next %s days</info>", $interval ) );

        $date = new \DateTime( sprintf( "%s days", $interval ) );

        $em = $this->getEntityManager();

        foreach ( $this->getTrainingManager()->getTrainingsByDate( $date ) as $training ) {
            /* @var $training Training */
            $output->writeln( sprintf( "- creating for Training: %s", $training->getName() ) );
            $trainingSession = $this->createTrainingSession( $training, $date );
            $em->persist( $trainingSession );
        }
        $em->flush();
    }

    /**
     * @return TrainingManager
     */
    protected function getTrainingManager()
    {
        return $this->getContainer()->get( 'sport_training.training.manager' );
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getContainer()->get( 'doctrine.orm.entity_manager' );
    }

    /**
     * @param Training $training
     * @param \DateTime $date
     * @return TrainingSession
     */
    protected function createTrainingSession( Training $training, \DateTime $date )
    {
        $date->setTime(
                $training->getScheduledTime()->format( 'H' ), $training->getScheduledTime()->format( 'i' ), $training->getScheduledTime()->format( 's' )
        );
        $trainingSession = new TrainingSession();
        $trainingSession->setActive( true )
                ->setScheduledDate( $date )
                ->setTraining( $training )
                ->setTrainingSessionStatus( $this->getTrainingSessionStatus() );
        return $trainingSession;
    }

    /**
     * @return TrainingSessionStatus
     */
    protected function getTrainingSessionStatus()
    {
        if ( !is_null( $this->statusRregistration ) ) {
            return $this->statusRregistration;
        }
        $this->statusRregistration = $this->getEntityManager()->find( 'SportTrainingBundle:TrainingSessionStatus', TrainingSessionStatus::STATUS_REGISTRATION );
        return $this->statusRregistration;
    }

}

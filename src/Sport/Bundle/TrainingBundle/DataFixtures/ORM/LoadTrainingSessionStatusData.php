<?php

namespace Sport\Bundle\TrainingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sport\Bundle\TrainingBundle\Entity\TrainingSessionStatus;

class LoadTrainingSessionStatusData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            [
                'code' => TrainingSessionStatus::STATUS_REGISTRATION,
                'name' => 'Prihlasovanie',
            ],
            [
                'code' => TrainingSessionStatus::STATUS_WILL_BE,
                'name' => 'Tréning bude',
            ],
            [
                'code' => TrainingSessionStatus::STATUS_CANCELLED,
                'name' => 'Zrušený',
            ],
            [
                'code' => TrainingSessionStatus::STATUS_DONE,
                'name' => 'Uskutočnený',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        foreach ( $this->getData() as $data ) {
            $entity = new TrainingSessionStatus();
            $entity->setCode( $data['code'] )
                    ->setName( $data['name'] )
            ;
            $manager->persist( $entity );
            $this->addReference( sprintf( "%s:%s", get_class( $entity ), $data['code'] ), $entity );
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

}

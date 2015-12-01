<?php

namespace Sport\Bundle\TrainingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sport\Bundle\TrainingBundle\Entity\SessionPresenceStatus;

class LoadSessionPresenceStatusData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            [
                'code' => SessionPresenceStatus::STATUS_NONE,
                'name' => '-',
            ],
            [
                'code' => SessionPresenceStatus::STATUS_GOING,
                'name' => 'prídem',
            ],
            [
                'code' => SessionPresenceStatus::STATUS_LATER,
                'name' => 'dám vedieť neskôr',
            ],
            [
                'code' => SessionPresenceStatus::STATUS_NOT_GOING,
                'name' => 'neprídem',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        foreach ( $this->getData() as $data ) {
            $entity = new SessionPresenceStatus();
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

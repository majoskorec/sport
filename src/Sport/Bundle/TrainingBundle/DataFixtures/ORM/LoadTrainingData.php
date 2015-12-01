<?php

namespace Sport\Bundle\TrainingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Sport\Bundle\TrainingBundle\Entity\Training;

class LoadTrainingData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            [
                'name' => 'Volejbal Vavilovova Utorok 2015/2016',
                'weekday' => 2,
                'place' => 'https://goo.gl/maps/vJFRf2nuci62',
                'scheduledTime' => '21:00:00',
                'validFrom' => '2015-09-01',
                'validTo' => '2016-06-30',
                'active' => true,
            ],
            [
                'name' => 'Volejbal Nevädzova Štvrtok 2015/2016',
                'weekday' => 4,
                'place' => 'https://goo.gl/maps/vGGifefnnhm',
                'scheduledTime' => '20:00:00',
                'validFrom' => '2015-09-01',
                'validTo' => '2016-06-30',
                'active' => true,
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        foreach ( $this->getData() as $data ) {
            $entity = new Training();
            $entity->setName( $data['name'] )
                    ->setWeekday( $data['weekday'] )
                    ->setPlace( $data['place'] )
                    ->setScheduledTime( \DateTime::createFromFormat( 'H:i:s', $data['scheduledTime'] ) )
                    ->setValidFrom( \DateTime::createFromFormat( 'Y-m-d', $data['validFrom'] ) )
                    ->setValidTo( \DateTime::createFromFormat( 'Y-m-d', $data['validTo'] ) )
                    ->setActive( $data['active'] )
            ;
            $manager->persist( $entity );
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }

}

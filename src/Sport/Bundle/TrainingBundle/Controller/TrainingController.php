<?php

namespace Sport\Bundle\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sport\Bundle\TrainingBundle\Entity\Manager\TrainingManager;

class TrainingController extends Controller
{

    /**
     * @Route("/trainings")
     * @Template()
     */
    public function listAction()
    {
        $entities = $this->getManager()->getList();

        return array('entities' => $entities);
    }

    /**
     * @Route("/training/{id}")
     * @Template()
     */
    public function detailAction( $id )
    {
        $entity = $this->getManager()->find( $id );
        if ( !$entity ) {
            throw $this->createNotFoundException( 'Training does not exist' );
        }

        return array('entity' => $entity);
    }

    /**
     * @return TrainingManager
     */
    protected function getManager()
    {
        return $this->get( 'sport_training.training.manager' );
    }

}

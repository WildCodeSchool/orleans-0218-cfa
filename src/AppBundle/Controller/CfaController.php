<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cfa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Cfa controller.
 *
 * @Route("cfa")
 */
class CfaController extends Controller
{
    /**
     * Lists all cfa entities.
     *
     * @Route("/", name="cfa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cfas = $em->getRepository(Cfa::class)->findAll();

        return $this->render('homepage/cfa.html.twig', array(
            'cfas' => $cfas,
        ));
    }
}

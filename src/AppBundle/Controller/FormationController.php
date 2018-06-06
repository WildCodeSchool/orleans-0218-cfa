<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends Controller
{
    /**
     * Lists all formation entities.
     *
     * @Route("/", name="formation")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AppBundle:Formation')->findAll();

        return $this->render('homepage/formation.html.twig', array(
            'formations' => $formations,
        ));
    }
}

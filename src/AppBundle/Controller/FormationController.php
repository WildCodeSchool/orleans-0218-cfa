<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Formation;

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
     * @Route("/", name="formation_list")
     * @Method("GET")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AppBundle:Formation')->findAll();

        return $this->render('homepage/formations.html.twig', array(
            'formations' => $formations,
        ));
    }

    /**
     * Lists all formation entities.
     *
     * @Route("/formations", name="formation_show")
     * @Method("GET")
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formation = $em->getRepository('AppBundle:Formation')->findOneBy([]);

        return $this->redirectToRoute('formation', ['id' => $formation->getId()]);
    }

    /**
     * Lists all formation entities.
     *
     * @Route("/{id}", name="formation")
     * @Method("GET")
     */
    public function indexAction(Formation $formation)
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AppBundle:Formation')->findAll();

        return $this->render('formation/public/formation.html.twig', array(
            'formations' => $formations,
            'formation' => $formation,
        ));
    }
}

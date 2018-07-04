<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Taxe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Taxe controller.
 *
 * @Route("/taxe")
 */
class TaxeController extends Controller
{
    /**
     * Lists all taxe entities.
     *
     * @Route("/", name="taxe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $taxes = $em->getRepository('AppBundle:Taxe')->findAll();

        return $this->render('taxe/index.html.twig', array(
            'taxes' => $taxes,
        ));
    }
}

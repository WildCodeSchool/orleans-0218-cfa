<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ufa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Map controller.
 *
 * @Route("map")
 */
class MapController extends Controller
{
    /**
     * Lists all cfa entities.
     *
     * @Route("/", name="map_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ufas = $em->getRepository('AppBundle:Ufa')->findAll();
        $ufa = $em->getRepository('AppBundle:Ufa')->findOneBy([]);

        return $this->render('ufa/public/map.html.twig', array(
            'ufas' => $ufas,
            'ufa'=> $ufa,
        ));
    }

    /**
     * Finds and displays a ufa entity.
     *
     * @Route("/{id}", name="map_show")
     * @Method("GET")
     */
    public function showAction(Ufa $ufa)
    {
        $em = $this->getDoctrine()->getManager();

        $ufas = $em->getRepository('AppBundle:Ufa')->findAll();
        $formations = $em->getRepository('AppBundle:Ufa')->findAll();

        return $this->render('ufa/public/map.html.twig', array(
            'ufas' => $ufas,
            'formations' => $formations,
            'ufa' => $ufa,
        ));
    }
}

<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ufa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cart controller.
 *
 * @Route("cart")
 */
class CartController extends Controller
{
    /**
     * Lists all cfa entities.
     *
     * @Route("/", name="cart_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ufas = $em->getRepository('AppBundle:Ufa')->findAll();

        return $this->render('ufa/public/cart.html.twig', array(
            'ufas' => $ufas,
        ));
    }

    /**
     * Finds and displays a ufa entity.
     *
     * @Route("/{id}", name="cart_show")
     * @Method("GET")
     */
    public function showAction(Ufa $ufa)
    {
        $em = $this->getDoctrine()->getManager();

        $ufas = $em->getRepository('AppBundle:Ufa')->findAll();

        return $this->render('ufa/public/cart.html.twig', array(
            'ufas' => $ufas,
            'ufa' => $ufa,
        ));
    }
}

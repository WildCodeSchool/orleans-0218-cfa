<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HistoricCfa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Historiccfa controller.
 *
 * @Route("historiccfa")
 */
class HistoricCfaController extends Controller
{
    /**
     * Lists all historicCfa entity
     *
     * List all formation entity
     *
     * @Route("/", name="historiccfa_view")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cfa = $em->getRepository('AppBundle:Cfa')->findBy([]);
        $historicCfas = $em->getRepository('AppBundle:HistoricCfa')->findBy(
            [],
            ['date' => 'DESC']
        );

        return $this->render('historiccfa/historiccfa.html.twig', [
            'historicCfas' => $historicCfas,
            'cfa' => $cfa,
        ]);
    }
}

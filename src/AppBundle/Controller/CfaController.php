<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cfa;
use AppBundle\Entity\Formation;
use AppBundle\Entity\Ufa;
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

    public function showCfaHomepageAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cfa = $em->getRepository(Cfa::class)->findOneBy([]);

        $formations = $em->getRepository(Formation::class)->findAll();

        $ufas = $em->getRepository(Ufa::class)->findAll();

        return $this->render('homepage/cfa.html.twig', array(
            'cfa' => $cfa,
            'formations' => $formations,
            'ufas' => $ufas
        ));
    }
}

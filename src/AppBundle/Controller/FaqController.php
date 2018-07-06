<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Faq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class FaqController
 * @Route("faq")
 */
class FaqController extends Controller
{
    /**
     * @Route("/", name="faq_index")
     * @Method("GET")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $faqs = $em->getRepository(Faq::class)->findAll();

        return $this->render('faq/public/faq.html.twig', array(
            'faqs' => $faqs
        ));
    }
}

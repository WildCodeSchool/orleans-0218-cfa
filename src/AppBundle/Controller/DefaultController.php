<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('homepage/homepage.html.twig');
    }

    /**
     * @Route("/faq", name="faqpage")
     */
    public function faqView()
    {
        return $this->render('faq/faq.html.twig');
    }

    /**
     * @Route("/apprenti/statut", name="statutapprentipage")
     */
    public function statutView()
    {
        return $this->render('apprenti/statut.html.twig');
    }

    /**
     * @Route("/apprenti/formation", name="formationapprentipage")
     */
    public function formationView()
    {
        return $this->render('apprenti/formation.html.twig');
    }

    /**
     * @Route("/employeurs/embaucher-un-apprenti", name="hireAnApprentice")
     */
    public function employerAction()
    {
        return $this->render('employer/hireAnApprentice.html.twig');
    }
  
    /**
     * @Route("/apprenti/contrat", name="contratapprentipage")
     */
    public function contratView()
    {
        return $this->render('apprenti/contrat.html.twig');
    }

    /**
     * @Route("/employeurs/les-principes-de-l'apprentissage", name="learningCondition")
     */
    public function learningConditionAction()
    {
        return $this->render('employer/learningCondition.html.twig');
    }

    /**
     * @Route("/employeurs/les-cotisations-sociales", name="socialSecurityContributions")
     */
    public function socialSecurityContributionsAction()
    {
        return $this->render('employer/socialSecurityContributions.html.twig');
    }
}

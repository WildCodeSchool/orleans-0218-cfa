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
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AppBundle:Formation')->findAll();
        return $this->render('apprenti/formation.html.twig', [
            'formations' => $formations,
        ]);
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
     * @Route("/employeurs/le-maitre-d'apprentissage", name="masterInstructor")
     */
    public function masterInstructorAction()
    {
        return $this->render('employer/masterInstructor.html.twig');
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

    /**
     * @Route("/employeurs/temoignages-des-employeurs", name="debriefingEmployers")
     */
    public function debriefingEmployers()
    {
        return $this->render('employer/debriefingEmployers.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="legales_notices")
     */
    public function showLegalesNocticesAction()
    {
        return $this->render('homepage/legalesNotices.html.twig');
    }
}

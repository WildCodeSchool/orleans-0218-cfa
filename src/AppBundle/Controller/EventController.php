<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Event controller.
 *
 * @Route("event")
 */
class EventController extends Controller
{
    /**
     * Lists all event entities.
     *
     * @Route("/", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle:Event')->findBy([], ['date'=>'DESC']);

        return $this->render('event/public/index.html.twig', array(
            'events' => $events,
        ));
    }

    /**
     * @param Event $events
     *
     */
    public function showHomepageSectionAction(int $limit = 3)
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle:Event')->findBy([], ['date'=>'DESC'], $limit);

        return $this->render('homepage/events.html.twig', array(
            'events' => $events,
        ));
    }
}

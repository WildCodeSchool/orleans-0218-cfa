<?php
/**
 * Created by PhpStorm.
 * User: wilder8
 * Date: 25/06/18
 * Time: 17:39
 */

namespace AppBundle\Controller\AdminController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\HistoricCfa;

/**
 * HistoricCfa controller.
 *
 * @Route("/cfabloisadmin/histoire")
 */
class AdminHistoricCfaController extends Controller
{
    /**
     * Lists all historicCfa entities.
     *
     * @Route("/", name="historicCfa_index")
     * @Method("GET")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historicCFas = $em->getRepository('AppBundle:HistoricCfa')->findAll();

        return $this->render('historiccfa/index.html.twig', [
            'historicCfas' => $historicCFas,
        ]);
    }
}

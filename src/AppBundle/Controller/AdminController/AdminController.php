<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 05/06/18
 * Time: 17:11
 */

namespace AppBundle\Controller\AdminController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_homepage")
     */
    public function indexAction()
    {
        return $this->render('homepageAdmin.html.twig');
    }
}

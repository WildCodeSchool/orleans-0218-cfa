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
 * @Route("admin")
 */
class AdminHistoricCfaController extends Controller
{
    /**
     * Lists all historicCfa entities.
     *
     * @Route("/histoire", name="historiccfa_index")
     * @Method("GET")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historicCfas = $em->getRepository('AppBundle:HistoricCfa')->findAll();

        return $this->render('historiccfa/index.html.twig', [
            'historicCfas' => $historicCfas,
        ]);
    }

    /**
     * Creates a new formation entity.
     *
     * @Route("histoire/new", name="historiccfa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $historicCfa = new HistoricCfa();
        $form = $this->createForm('AppBundle\Form\HistoricCfaType', $historicCfa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historicCfa);
            $em->flush();

            return $this->redirectToRoute('historiccfa_show', ['id' => $historicCfa->getId()]);
        }

        return $this->render('historiccfa/new.html.twig', [
            'historicCfa' => $historicCfa,
            'form' => $form->createView(),
        ]);
    }
  
    /**
     * Displays a form to edit an existing formation entity.
     *
     * @Route("/{id}/edit", name="historiccfa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HistoricCfa $historicCfa)
    {
        $deleteForm = $this->createDeleteForm($historicCfa);
        $editForm = $this->createForm('AppBundle\Form\HistoricCfaType', $historicCfa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('historiccfa_edit', ['id' => $historicCfa->getId()]);
        }

        return $this->render('historicfa/edit.html.twig', [
            'historicCfa' => $historicCfa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a formation entity.
     *
     * @Route("/{id}", name="formation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HistoricCfa $historicCfa)
    {
        $form = $this->createDeleteForm($historicCfa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($historicCfa);
            $em->flush();
        }

        return $this->redirectToRoute('historiccfa_index');
    }
}

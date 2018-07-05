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
     * @Route("/", name="historiccfa_index")
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
     * Creates a new historicCfa entity.
     *
     * @Route("/new", name="historiccfa_new")
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
     * Finds and displays a historicCfa entity.
     *
     * @Route("/{id}", name="historiccfa_show")
     * @Method("GET")
     */
    public function showAction(HistoricCfa $historicCfa)
    {
        $deleteForm = $this->createDeleteForm($historicCfa);

        return $this->render('historiccfa/show.html.twig', [
            'historicCfa' => $historicCfa,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a HistoricCfa entity.
     *
     * @Route("/{id}", name="historiccfa_delete")
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
  
    /**
     * Displays a form to edit an existing HistoricCfa entity.
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

        return $this->render('historiccfa/edit.html.twig', [
            'historicCfa' => $historicCfa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Creates a form to delete a HistoricCfa entity.
     *
     * @param HistoricCfa $historicCfa
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(HistoricCfa $historicCfa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historiccfa_delete', ['id' => $historicCfa->getId()]))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

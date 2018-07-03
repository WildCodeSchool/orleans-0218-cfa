<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
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

        $historicCfas = $em->getRepository('AppBundle:HistoricCfa')->findBy(
            [],
            ['date' => 'DESC']
        );



        return $this->render('historiccfa/historiccfa.html.twig', [
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
        $historicCfa = new Historiccfa();
        $form = $this->createForm('AppBundle\Form\HistoricCfaType', $historicCfa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historicCfa);
            $em->flush();

            return $this->redirectToRoute('historiccfa_show', array('id' => $historicCfa->getId()));
        }

        return $this->render('historiccfa/new.html.twig', array(
            'historicCfa' => $historicCfa,
            'form' => $form->createView(),
        ));
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

        return $this->render('historiccfa/show.html.twig', array(
            'historicCfa' => $historicCfa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing historicCfa entity.
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

            return $this->redirectToRoute('historiccfa_edit', array('id' => $historicCfa->getId()));
        }

        return $this->render('historiccfa/edit.html.twig', array(
            'historicCfa' => $historicCfa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a historicCfa entity.
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
     * Creates a form to delete a historicCfa entity.
     *
     * @param HistoricCfa $historicCfa The historicCfa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HistoricCfa $historicCfa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historiccfa_delete', array('id' => $historicCfa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

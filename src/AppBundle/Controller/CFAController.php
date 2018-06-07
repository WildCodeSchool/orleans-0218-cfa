<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CFA;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cfa controller.
 *
 * @Route("cfa")
 */
class CFAController extends Controller
{
    /**
     * Lists all cFA entities.
     *
     * @Route("/", name="cfa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cFAs = $em->getRepository('AppBundle:CFA')->findAll();

        return $this->render('cfa/index.html.twig', array(
            'cFAs' => $cFAs,
        ));
    }

    /**
     * Creates a new cFA entity.
     *
     * @Route("/new", name="cfa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cFA = new Cfa();
        $form = $this->createForm('AppBundle\Form\CFAType', $cFA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cFA);
            $em->flush();

            return $this->redirectToRoute('cfa_show', array('id' => $cFA->getId()));
        }

        return $this->render('cfa/new.html.twig', array(
            'cFA' => $cFA,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cFA entity.
     *
     * @Route("/{id}", name="cfa_show")
     * @Method("GET")
     */
    public function showAction(CFA $cFA)
    {
        $deleteForm = $this->createDeleteForm($cFA);

        return $this->render('cfa/show.html.twig', array(
            'cFA' => $cFA,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cFA entity.
     *
     * @Route("/{id}/edit", name="cfa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CFA $cFA)
    {
        $deleteForm = $this->createDeleteForm($cFA);
        $editForm = $this->createForm('AppBundle\Form\CFAType', $cFA);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cfa_edit', array('id' => $cFA->getId()));
        }

        return $this->render('cfa/edit.html.twig', array(
            'cFA' => $cFA,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cFA entity.
     *
     * @Route("/{id}", name="cfa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CFA $cFA)
    {
        $form = $this->createDeleteForm($cFA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cFA);
            $em->flush();
        }

        return $this->redirectToRoute('cfa_index');
    }

    /**
     * Creates a form to delete a cFA entity.
     *
     * @param CFA $cFA The cFA entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CFA $cFA)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cfa_delete', array('id' => $cFA->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

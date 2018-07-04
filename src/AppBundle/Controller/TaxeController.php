<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Taxe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Taxe controller.
 *
 * @Route("cfabloisadmin/taxe")
 */
class TaxeController extends Controller
{
    /**
     * Lists all taxe entities.
     *
     * @Route("/", name="taxe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $taxes = $em->getRepository('AppBundle:Taxe')->findAll();

        return $this->render('taxe/index.html.twig', array(
            'taxes' => $taxes,
        ));
    }

    /**
     * Creates a new taxe entity.
     *
     * @Route("/new", name="taxe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $taxe = new Taxe();
        $form = $this->createForm('AppBundle\Form\TaxeType', $taxe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($taxe);
            $em->flush();

            return $this->redirectToRoute('taxe_show', array('id' => $taxe->getId()));
        }

        return $this->render('taxe/new.html.twig', array(
            'taxe' => $taxe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a taxe entity.
     *
     * @Route("/{id}", name="taxe_show")
     * @Method("GET")
     */
    public function showAction(Taxe $taxe)
    {
        $deleteForm = $this->createDeleteForm($taxe);

        return $this->render('taxe/show.html.twig', array(
            'taxe' => $taxe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing taxe entity.
     *
     * @Route("/{id}/edit", name="taxe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Taxe $taxe)
    {
        $deleteForm = $this->createDeleteForm($taxe);
        $editForm = $this->createForm('AppBundle\Form\TaxeType', $taxe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('taxe_edit', array('id' => $taxe->getId()));
        }

        return $this->render('taxe/edit.html.twig', array(
            'taxe' => $taxe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a taxe entity.
     *
     * @Route("/{id}", name="taxe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Taxe $taxe)
    {
        $form = $this->createDeleteForm($taxe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($taxe);
            $em->flush();
        }

        return $this->redirectToRoute('taxe_index');
    }

    /**
     * Creates a form to delete a taxe entity.
     *
     * @param Taxe $taxe The taxe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Taxe $taxe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('taxe_delete', array('id' => $taxe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

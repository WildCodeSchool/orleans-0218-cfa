<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partnair;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Partnair controller.
 *
 * @Route("partnair")
 */
class PartnairController extends Controller
{
    /**
     * Lists all partnair entities.
     *
     * @Route("/",    name="partnair_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partnairs = $em->getRepository('AppBundle:Partnair')->findAll();

        return $this->render('partnair/index.html.twig', array(
            'partnairs' => $partnairs,
        ));
    }

    /**
     * Creates a new partnair entity.
     *
     * @Route("/new/", name="partnair_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();

        $newPartnair = new Partnair();
        $form = $this->createForm('AppBundle\Form\PartnairType', $newPartnair);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newPartnair);
            $em->flush();

            return $this->redirectToRoute('partnair_show', array(
                'partnairs' => $partnairs,
                'id' => $partnair->getId(),
            ));
        }

        return $this->render('partnair/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partnair entity.
     *
     * @Route("/{id}", name="partnair_show")
     * @Method("GET")
     */
    public function showAction(Partnair $partnair)
    {
        $deleteForm = $this->createDeleteForm($partnair);

        return $this->render('partnair/show.html.twig', array(
            'partnair' => $partnair,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partnair entity.
     *
     * @Route("/{id}/edit", name="partnair_edit")
     * @Method({"GET",      "POST"})
     */
    public function editAction(Request $request, Partnair $partnair)
    {
        $deleteForm = $this->createDeleteForm($partnair);
        $editForm = $this->createForm('AppBundle\Form\PartnairType', $partnair);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partnair_edit', array(
                'id' => $partnair->getId()
            ));
        }

        return $this->render('partnair/edit.html.twig', array(
            'partnair' => $partnair,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partnair entity.
     *
     * @Route("/{id}",   name="partnair_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Partnair $partnair)
    {
        $form = $this->createDeleteForm($partnair);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partnair);
            $em->flush();
        }

        return $this->redirectToRoute('partnair_index');
    }

    /**
     * Creates a form to delete a partnair entity.
     *
     * @param Partnair $partnair The partnair entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partnair $partnair)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partnair_delete', array('id' => $partnair->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    public function showHomepageSliderAction()
    {
        $em = $this->getDoctrine()->getManager();
        $partnairs = $em->getRepository('AppBundle:Partnair')->findAll();

        return $this->render('homepage/logoPartner.html.twig', array(
            'partnairs' => $partnairs
        ));

    }
}

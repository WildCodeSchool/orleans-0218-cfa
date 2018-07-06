<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ufa;
use AppBundle\Services\CoordinatesService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ufa controller.
 *
 * @Route("/cfabloisadmin/ufa")
 */
class UfaController extends Controller
{
    /**
     * Lists all ufa entities.
     *
     * @Route("/", name="ufa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ufas = $em->getRepository('AppBundle:Ufa')->findAll();

        return $this->render('ufa/index.html.twig', array(
            'ufas' => $ufas,
        ));
    }

    /**
     * Creates a new ufa entity.
     *
     * @Route("/admin/new", name="ufa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, CoordinatesService $coordinatesService)
    {
        $ufa = new Ufa();
        $form = $this->createForm('AppBundle\Form\UfaType', $ufa);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coordinates = $coordinatesService->getCoordinates($ufa->getAddress(), $ufa->getZipcode());
            [$longitude, $latitude] = $coordinates;
            $ufa->setLatitude($latitude);
            $ufa->setLongitude($longitude);
            $em = $this->getDoctrine()->getManager();
            $em->persist($ufa);
            $em->flush();

            return $this->redirectToRoute('ufa_show', array('id' => $ufa->getId()));
        }
        return $this->render('ufa/new.html.twig', array(
            'ufa' => $ufa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ufa entity.
     *
     * @Route("/{id}", name="ufa_show")
     * @Method("GET")
     */
    public function showAction(Ufa $ufa)
    {
        $deleteForm = $this->createDeleteForm($ufa);

        return $this->render('ufa/show.html.twig', array(
            'ufa' => $ufa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ufa entity.
     *
     * @Route("/{id}/edit", name="ufa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CoordinatesService $coordinatesService, Ufa $ufa)
    {
        $deleteForm = $this->createDeleteForm($ufa);
        $editForm = $this->createForm('AppBundle\Form\UfaType', $ufa);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $coordinates = $coordinatesService->getCoordinates($ufa->getAddress(), $ufa->getZipcode());
            [$longitude, $latitude] = $coordinates;
            $ufa->setLatitude($latitude);
            $ufa->setLongitude($longitude);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ufa_index', array(
                'id' => $ufa->getId()
            ));
        }
        return $this->render('ufa/edit.html.twig', array(
            'ufa' => $ufa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ufa entity.
     *
     * @Route("/{id}/editcoord", name="ufa_edit_coord")
     * @Method({"GET", "POST"})
     */
    public function editCoordAction(Request $request, Ufa $ufa)
    {
        $deleteForm = $this->createDeleteForm($ufa);
        $editCoordForm = $this->createForm('AppBundle\Form\UfaCoordType', $ufa);
        $editCoordForm
            ->add('latitude')
            ->add('longitude');

        $editCoordForm->handleRequest($request);

        if ($editCoordForm->isSubmitted() && $editCoordForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ufa_index', array(
                'id' => $ufa->getId()
            ));
        }
        return $this->render('ufa/editCoord.html.twig', array(
            'ufa' => $ufa,
            'edit_coord_form' => $editCoordForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ufa entity.
     *
     * @Route("/{id}", name="ufa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ufa $ufa)
    {
        $form = $this->createDeleteForm($ufa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ufa);
            $em->flush();
        }
        return $this->redirectToRoute('ufa_index');
    }

    /**
     * Creates a form to delete a ufa entity.
     *
     * @param Ufa $ufa The ufa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ufa $ufa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ufa_delete', array('id' => $ufa->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

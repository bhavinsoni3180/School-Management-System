<?php

namespace Admin\LoginBundle\Controller;

use Admin\LoginBundle\Entity\TblParent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tblparent controller.
 *
 */
class TblParentController extends Controller
{
    /**
     * Lists all tblParent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tblParents = $em->getRepository('AdminLoginBundle:TblParent')->findAll();

        return $this->render('tblparent/index.html.twig', array(
            'tblParents' => $tblParents,
        ));
    }

    /**
     * Creates a new tblParent entity.
     *
     */
    public function newAction(Request $request)
    {
        $tblParent = new Tblparent();
        $form = $this->createForm('Admin\LoginBundle\Form\TblParentType', $tblParent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tblParent);
            $em->flush();

            return $this->redirectToRoute('tblparent_show', array('biperentid' => $tblParent->getBiperentid()));
        }

        return $this->render('tblparent/new.html.twig', array(
            'tblParent' => $tblParent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tblParent entity.
     *
     */
    public function showAction(TblParent $tblParent)
    {
        $deleteForm = $this->createDeleteForm($tblParent);

        return $this->render('tblparent/show.html.twig', array(
            'tblParent' => $tblParent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tblParent entity.
     *
     */
    public function editAction(Request $request, TblParent $tblParent)
    {
        $deleteForm = $this->createDeleteForm($tblParent);
        $editForm = $this->createForm('Admin\LoginBundle\Form\TblParentType', $tblParent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tblparent_edit', array('biperentid' => $tblParent->getBiperentid()));
        }

        return $this->render('tblparent/edit.html.twig', array(
            'tblParent' => $tblParent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tblParent entity.
     *
     */
    public function deleteAction(Request $request, TblParent $tblParent)
    {
        $form = $this->createDeleteForm($tblParent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tblParent);
            $em->flush();
        }

        return $this->redirectToRoute('tblparent_index');
    }

    /**
     * Creates a form to delete a tblParent entity.
     *
     * @param TblParent $tblParent The tblParent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TblParent $tblParent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tblparent_delete', array('biperentid' => $tblParent->getBiperentid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

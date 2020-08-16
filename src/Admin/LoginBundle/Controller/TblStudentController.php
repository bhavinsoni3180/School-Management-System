<?php

namespace Admin\LoginBundle\Controller;

use Admin\LoginBundle\Entity\TblStudent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tblstudent controller.
 *
 */
class TblStudentController extends Controller
{
    /**
     * Lists all tblStudent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tblStudents = $em->getRepository('AdminLoginBundle:TblStudent')->findAll();

        return $this->render('tblstudent/index.html.twig', array(
            'tblStudents' => $tblStudents,
        ));
    }

    /**
     * Creates a new tblStudent entity.
     *
     */
    public function newAction(Request $request)
    {
        $tblStudent = new Tblstudent();
        $form = $this->createForm('Admin\LoginBundle\Form\TblStudentType', $tblStudent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tblStudent);
            $em->flush();

            return $this->redirectToRoute('tblstudent_show', array('bistudentid' => $tblStudent->getBistudentid()));
        }

        return $this->render('tblstudent/new.html.twig', array(
            'tblStudent' => $tblStudent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tblStudent entity.
     *
     */
    public function showAction(TblStudent $tblStudent)
    {
        $deleteForm = $this->createDeleteForm($tblStudent);

        return $this->render('tblstudent/show.html.twig', array(
            'tblStudent' => $tblStudent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tblStudent entity.
     *
     */
    public function editAction(Request $request, TblStudent $tblStudent)
    {
        $deleteForm = $this->createDeleteForm($tblStudent);
        $editForm = $this->createForm('Admin\LoginBundle\Form\TblStudentType', $tblStudent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tblstudent_edit', array('bistudentid' => $tblStudent->getBistudentid()));
        }

        return $this->render('tblstudent/edit.html.twig', array(
            'tblStudent' => $tblStudent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tblStudent entity.
     *
     */
    public function deleteAction(Request $request, TblStudent $tblStudent)
    {
        $form = $this->createDeleteForm($tblStudent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tblStudent);
            $em->flush();
        }

        return $this->redirectToRoute('tblstudent_index');
    }

    /**
     * Creates a form to delete a tblStudent entity.
     *
     * @param TblStudent $tblStudent The tblStudent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TblStudent $tblStudent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tblstudent_delete', array('bistudentid' => $tblStudent->getBistudentid())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

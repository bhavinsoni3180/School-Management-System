<?php

namespace Admin\LoginBundle\Controller;

use Admin\LoginBundle\Entity\TblTeacher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Session\Session;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Admin\LoginBundle\Models\Login;
use Symfony\Component\Translation\Translator;

/**
 * Tblteacher controller.
 *
 */
class TblTeacherController extends Controller
{
    /**
     * Lists all tblTeacher entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
		
        $tblTeachers = $em->getRepository('AdminLoginBundle:TblTeacher')->findAll();
		$session = new Session(); // create a new session 
		$connection = $em->getConnection();
		
		$session = $this->get('session');
		$user_id = $session->get('uId');
		$new_array = array();
        $em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$today = date('Y-m-d');
		
		if($user_id) 
		{
			return $this->render('tblteacher/index.html.twig', array('tblTeachers' => $tblTeachers));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_login_homepage')); // redirect on login page 
		}
    }

    /**
     * Creates a new tblTeacher entity.
     *
     */
    public function newAction(Request $request)
    {
        $tblTeacher = new Tblteacher();
        $form = $this->createForm('Admin\LoginBundle\Form\TblTeacherType', $tblTeacher);
        $form->handleRequest($request);

		$session = $this->get('session');
		$user_id = $session->get('uId');
		$new_array = array();
        $em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$today = date('Y-m-d');
		
		if($user_id) 
		{
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tblTeacher);
            $em->flush();

            return $this->redirectToRoute('tblteacher_show', array('biteacherid' => $tblTeacher->getBiteacherid()));
        }

        return $this->render('tblteacher/new.html.twig', array(
            'tblTeacher' => $tblTeacher,
            'form' => $form->createView(),
        ));
		}else{
			return $this->redirect($this->generateUrl('admin_login_homepage')); // redirect on login page 
		}
		
    }

    /**
     * Finds and displays a tblTeacher entity.
     *
     */
    public function showAction(TblTeacher $tblTeacher)
    {
		$session = $this->get('session');
		$user_id = $session->get('uId');
		$new_array = array();
        $em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$today = date('Y-m-d');
		
		if($user_id) 
		{
		$tblTeacher = new Tblteacher();
        $form = $this->createForm('Admin\LoginBundle\Form\TblTeacherType', $tblTeacher);
        $form->handleRequest($request);

		
        $deleteForm = $this->createDeleteForm($tblTeacher);

        return $this->render('tblteacher/show.html.twig', array(
            'tblTeacher' => $tblTeacher,
            'delete_form' => $deleteForm->createView(),
        ));
		}else{
			return $this->redirect($this->generateUrl('admin_login_homepage')); // redirect on login page 
		}
    }

    /**
     * Displays a form to edit an existing tblTeacher entity.
     *
     */
    public function editAction(Request $request, TblTeacher $tblTeacher)
    {
        
			if ($editForm->isSubmitted() && $editForm->isValid()) {
				$this->getDoctrine()->getManager()->flush();

				return $this->redirectToRoute('tblteacher_edit', array('biteacherid' => $tblTeacher->getBiteacherid()));
			}

			return $this->render('tblteacher/edit.html.twig', array(
				'tblTeacher' => $tblTeacher,
				'edit_form' => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
			));
		
    }

    /**
     * Deletes a tblTeacher entity.
     *
     */
    public function deleteAction(Request $request, TblTeacher $tblTeacher)
    {
		$tblTeacher = new Tblteacher();
        $form = $this->createForm('Admin\LoginBundle\Form\TblTeacherType', $tblTeacher);
        $form->handleRequest($request);

		$session = $this->get('session');
		$user_id = $session->get('uId');
		$new_array = array();
        $em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$today = date('Y-m-d');
		
		if($user_id) 
		{
        $form = $this->createDeleteForm($tblTeacher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tblTeacher);
            $em->flush();
        }

        return $this->redirectToRoute('tblteacher_index');
		}else{
			return $this->redirect($this->generateUrl('admin_login_homepage')); // redirect on login page 
		}
    }

    /**
     * Creates a form to delete a tblTeacher entity.
     *
     * @param TblTeacher $tblTeacher The tblTeacher entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TblTeacher $tblTeacher)
    {
		$tblTeacher = new Tblteacher();
        $form = $this->createForm('Admin\LoginBundle\Form\TblTeacherType', $tblTeacher);
        $form->handleRequest($request);

		$session = $this->get('session');
		$user_id = $session->get('uId');
		$new_array = array();
        $em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$today = date('Y-m-d');
		
		if($user_id) 
		{
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tblteacher_delete', array('biteacherid' => $tblTeacher->getBiteacherid())))
            ->setMethod('DELETE')
            ->getForm();
			}else{
			return $this->redirect($this->generateUrl('admin_login_homepage')); // redirect on login page 
		}
    }
}

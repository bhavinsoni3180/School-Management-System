<?php

namespace Admin\LoginBundle\Controller;

use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

class StudentController extends Controller
{
    public function studentListAction() 
    {
        return $this->render('AdminLoginBundle:student:student-list.html.twig');
    }
	public function pre($array) {
		echo "<pre>";
		print_r($array);
		exit;
	}

}
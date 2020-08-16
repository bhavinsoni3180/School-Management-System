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

class DefaultController extends Controller
{
    public function indexAction()  // function is declare as public which is redirect on index page 
    {
        return $this->render('AdminLoginBundle:Security:login.html.twig');
		//return $this->redirect($this->generateUrl('admin_dashboard'));
    }
	
	public function loginAction(Request $request)  // this is code for login which is compare the data and allow the login 
	{
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('AdminLoginBundle:TblUser'); // connection with database table
		$session = new Session(); // create a new session 
		$connection = $em->getConnection(); 
	

		if ($request->getMethod() == 'POST')  // condition for login using post method  
		{
			$username = $request->get('email');
			$password = md5($request->get('password'));
		
			$user_data = $connection->prepare("SELECT * FROM tbl_user WHERE vPassWord = '$password' AND eStatus = '1' AND eDelete = '0' AND vUserName = '$username' "); 
			$user_data->execute();
			$user = $user_data->fetchAll();
			// start condition for login using session and connect the colom of table
			if($user){ 
				$session->clear();
				$session->start();
				$session->set('uId', $user[0]['biUserID']);
				$session->set('uEmail', $user[0]['vEmail']);
				return $this->redirect($this->generateUrl('admin_dashboard'));
			}else{
				return $this->render('AdminLoginBundle:Security:login.html.twig',array('error' =>('Invalid Username or Password')));// redirect on index form on wrong data input with error	
			}
			// End condition for login using session and connect the colom of table
		}
		else 
		{
			if ($session->has('vEmail')) // session for email
			{ 
				$user = $repository->findOneBy(array('email' => $session->get('vEmail')));
				if ($user)  
				{
					return $this->redirect($this->generateUrl('admin_dashboard'));
				} 
				else 
				{
					$session->clear(); // session clear on wrong data and redirect on index
					return $this->render('AdminLoginBundle:Security:login.html.twig');//array('error' => 'Invalid_Session'));
				}
			} 
			else 
			{
				$session->clear(); // session clear on wrong data and redirect on index
				return $this->render('AdminLoginBundle:Security:login.html.twig');// array('error' => ''));
			}
		}
	}
	public function dashboardAction() // dashbord of admin panel
	{	// check the user login other wise redirect on login page
		$session = $this->get('session');
		$user_id = $session->get('uId');
		$new_array = array();
        $em = $this->getDoctrine()->getManager();
		$connection = $em->getConnection();
		$today = date('Y-m-d');  
		// redirect on dashboard page on right data 
		if($user_id) 
		{
			return $this->render('AdminLoginBundle:Default:dashbord.html.twig');
			
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_login_homepage')); // redirect on login page 
		}
	}
		
	public function logoutAction() // logout condition for user  
	{
		$session = new Session(); // clear the session and logout the user
		$session->clear();
		return $this->redirect($this->generateUrl('admin_login_homepage'));
	}
	
	public function forgotPasswordAction(Request $request) // forget password start
	{
		
        $response = array(); 
        $em = $this->getDoctrine()->getEntityManager();
        if ($request->get('email') != '') 
		{
			$email = $request->get('email');
			
			$obj_admin = $em->getRepository('AdminLoginBundle:TblUser')->findOneBy(array('vemail' => $request->get('email')));
			if (!empty($obj_admin)) 
			{  
				
				$unique_id = $this->getRandomCode();
				$obj_admin->setvUid($unique_id);
				$em->persist($obj_admin);
				$em->flush();
				/* $host = $this->$request->getScheme(); */
				if ($obj_admin->getbiUserID()) 
				{
					$mailer_user = $this->getParameter('mailer_user');
					$Body = $request->getScheme() . '://' . $request->getHttpHost() . '/admin/reset-password/' . $obj_admin->getvUid();
					$ismailsend = $this->sendEmailForgotPassword($mailer_user, $email, 'Admin Password Reset', $Body, 0, "", array());
					if ($ismailsend) 
						$response = array("success" => true, 'flag' => 'mail-send');
				}
			}else 
			{
				$response = array("success" => false, "flag" => 'no-email');
			}
		}
		
       return new Response(json_encode($response, true));
    }
	
	public function getRandomCode() {
        $an = "0123456789abcdefghijklmnopqrstuvwxyz";
        $su = strlen($an) - 1;
        return substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1) .
                substr($an, rand(0, $su), 1);
    }
	
	public function sendEmailForgotPassword($From_email, $To_email, $Subject, $Body, $is_template = 1, $template = "", $parameters = array()) 
	{
		$mailer_user = $this->container->getParameter('mailer_user');
        $mailer_password = $this->container->getParameter('mailer_password');
        $mailer_host = $this->container->getParameter('mailer_host');
        $transport = \Swift_SmtpTransport::newInstance($mailer_host, 25)
                ->setUsername($mailer_user)
                ->setPassword($mailer_password);
        /* $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUsername('nirav@akshargrouptechnologies.com')
                ->setPassword('Akshar@123'); */
        $mailer = \Swift_Mailer::newInstance($transport);
        if ($is_template == 1) 
		{
            $mail = \Swift_Message::newInstance('Wonderful Subject')
                    ->setSubject($Subject)
                    ->setFrom($From_email)
                    ->setTo($To_email)
                    ->setBody(
                    $this->renderView(
                            // app/Resources/views/Emails/registration.html.twig
                            "$template", $parameters
                    ), 'text/html'
            );
        } 
		else 
		{
            $mail = \Swift_Message::newInstance()
                    ->setSubject($Subject)
                    ->setFrom($From_email)
                    ->setTo($To_email)
                    ->setBody($Body, 'text/html');
        }
        $mailer1 = $mailer->send($mail);
        if ($mailer1) 
		{
            return true;
        }
        return false;
    }

	public function reSetPasswordAction(Request $request) 
	{
		$em = $this->getDoctrine()->getEntityManager();
		
			if ($request->getMethod() == 'POST') {
				$new_password = $request->get('_password_new');
				$new_conform_password = $request->get('_password_new_one');
				//echo($new_password);exit;
				$obj_admin = $em->getRepository('AdminLoginBundle:TblUser')->findOneBy(array('vuid' => $request->get('flag')));
				//$this->pre($obj_admin);
				if($new_password == $new_conform_password)
				{
					if ($obj_admin) {
						$obj_admin->setvPassWord(md5($new_password));
						//$obj_admin->setVpassword($new_password);
						$obj_admin->setvUid(NULL);
						$em->persist($obj_admin);
						$em->flush();
					}
					return $this->redirect($this->generateUrl('admin_login_homepage'));
				}else{
					$pass = "please make both password same";
					return $this->render('AdminLoginBundle:Security:resetpassword.html.twig', array('flag' => $request->get('flag'),"pass" => $pass));
				}
			
			}

		
	
		return $this->render('AdminLoginBundle:Security:resetpassword.html.twig', array('flag' => $request->get('flag')));
    }
	 public function pre($array) {
			echo "<pre>";
			print_r($array);
			exit;
		}

}
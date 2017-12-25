<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 25/12/17
 * Time: 5:47.
 */

namespace AppBundle\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthLoginController extends Controller
{
    public function indexAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('office_admin_index');
        } elseif ($this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('office_user_homepage');
        } elseif ($this->isGranted('ROLE_VALIDATOR')) {
            return $this->redirectToRoute('office_validator_index');
        }

        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppBundle:auth:login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
}

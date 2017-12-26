<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 22:14.
 */

namespace AppBundle\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthLogoutController extends Controller
{
    public function indexAction(Session $session)
    {
        $session->clear();

        return $this->redirectToRoute('medical_auth_login');
    }
}

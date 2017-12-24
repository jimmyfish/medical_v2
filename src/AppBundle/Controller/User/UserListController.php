<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 25/12/17
 * Time: 5:04.
 */

namespace AppBundle\Controller\User;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class UserListController.
 */
class UserListController extends Controller
{
    public function indexAction()
    {
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findAll();

        return $this->render('AppBundle:user:index.html.twig', [
            'user' => $user,
        ]);
    }
}

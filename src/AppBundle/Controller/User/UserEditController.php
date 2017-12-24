<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 25/12/17
 * Time: 5:16
 */

namespace AppBundle\Controller\User;


use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserEditController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $user = $manager->getRepository(User::class)->find(
            $request->get('id')
        );

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager->persist($user);
            $manager->flush();

            return $this->redirect($request->headers->get('referer'));
        }

        return $this->render('AppBundle:user:form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit Pengguna'
        ]);
    }
}
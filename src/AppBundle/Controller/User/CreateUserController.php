<?php

namespace AppBundle\Controller\User;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Util\Debug;

/**
 * Class CreateUserController.
 */
class CreateUserController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function indexAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			
			// MENGATUR ROLE SECARA OTOMATIS SESUAI DENGAN BAGIAN YANG DIPILIH
            $choices = $user->getBagian();
            if ($choices == 1) {
                $user->setRoles(array('ROLE_MANAJER'));
            } else if ($choices == 2) {
                $user->setRoles(array('ROLE_ANALIS'));
            } else if ($choices == 3) {
                $user->setRoles(array('ROLE_PELAYANAN'));
            }
			
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);

            try {
                $manager->flush();

                return $this->redirect($request->headers->get('referer'));
            } catch (\Exception $e) {
                $this->addFlash('message', $e->getMessage());
            }

            return $this->redirect($request->headers->get('referer'));
        }

        return $this->render('AppBundle:user:form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Tambah Pengguna',
        ]);
    }
}

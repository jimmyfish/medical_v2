<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 3:51.
 */

namespace AppBundle\Controller\Laboratorium;

use AppBundle\Entity\Laboratorium;
use AppBundle\Form\LaboratoriumType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LaboratoriumCreateController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = new Laboratorium();
        $form = $this->createForm(LaboratoriumType::class, $data);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data->setId($this->get('security.token_storage')->getToken()->getUser());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($data);

            try {
                $manager->flush();
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('message', $e->getMessage());

                return $this->redirect($request->headers->get('referer'));
            }

            return $this->redirectToRoute('medical_lab_index');
        }

        return $this->render('AppBundle:lab:form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Tambah Laboratorium',
        ]);
    }
}

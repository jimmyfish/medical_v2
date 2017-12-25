<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 4:11.
 */

namespace AppBundle\Controller\Laboratorium;

use AppBundle\Entity\Laboratorium;
use AppBundle\Form\LaboratoriumType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LaboratoriumEditController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = $manager->getRepository(Laboratorium::class)->find($request->get('id'));
        $form = $this->createForm(LaboratoriumType::class, $data);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($data);

            try {
                $manager->flush();

                return $this->redirectToRoute('medical_lab_index');
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('message', $e->getMessage());

                return $this->redirect($request->headers->get('referer'));
            }
        }

        return $this->render('AppBundle:lab:form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit Laboratorium',
        ]);
    }
}

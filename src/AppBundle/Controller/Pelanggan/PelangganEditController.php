<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 21:51
 */

namespace AppBundle\Controller\Pelanggan;


use AppBundle\Entity\Pelanggan;
use AppBundle\Form\PelangganType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PelangganEditController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = $manager->getRepository(Pelanggan::class)->find($request->get('id'));

        $form = $this->createForm(PelangganType::class, $data);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager->persist($data);

            try {
                $manager->flush();

                return $this->redirectToRoute('medical_pelanggan_index');
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('message', $e->getMessage());

                return $this->redirect($request->headers->get('referer'));
            }
        }

        return $this->render('AppBundle:pelanggan:form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit Pelanggan',
        ]);
    }
}
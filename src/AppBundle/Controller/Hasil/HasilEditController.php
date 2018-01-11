<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/01/18
 * Time: 2:30
 */

namespace AppBundle\Controller\Hasil;


use AppBundle\Entity\Hasil;
use AppBundle\Form\HasilType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HasilEditController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getManager()->getRepository(Hasil::class)->find($request->get('id'));

        $form = $this->createForm(HasilType::class, $data);

        $form->handleRequest($request);

        if ($data instanceof Hasil) {
            if ($form->isValid() && $form->isSubmitted()) {
                $manager = $this->getDoctrine()->getManager();

                $data->setIsApproved(null);

                $manager->persist($data);
                $manager->flush();

                return $this->redirectToRoute('medical_hasil_refusal');
            }
        }

        return $this->render('AppBundle:hasil:edit.html.twig', [
            'form' => $form->createView(),
            'title' => 'Edit Hasil',
        ]);
    }
}
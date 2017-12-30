<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 30/12/17
 * Time: 21:56
 */

namespace AppBundle\Controller\Hasil;


use AppBundle\Entity\Hasil;
use AppBundle\Form\HasilType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HasilCreateController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = new Hasil();

        $form = $this->createForm(HasilType::class, $data);

        $form->handleRequest($request);

        return $this->render('AppBundle:hasil:form.html.twig', [
            'form' => $form->createView(),
            'title' => 'Tambah Hasil',
        ]);
    }
}
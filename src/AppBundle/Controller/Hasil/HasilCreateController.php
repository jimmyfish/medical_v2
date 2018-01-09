<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 30/12/17
 * Time: 21:56.
 */

namespace AppBundle\Controller\Hasil;

use AppBundle\Entity\Hasil;
use AppBundle\Entity\Transaksi;
use AppBundle\Form\HasilType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HasilCreateController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = new Hasil();

        $transaksi = $manager->getRepository(Transaksi::class)->findAll();

        $form = $this->createForm(HasilType::class, $data);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $check = $manager->getRepository(Hasil::class)->findBy([
                'transaksi' => $request->get('hasil_transaksi'),
            ]);

            if (0 != count($check)) {
                return new JsonResponse('Duplicate Entry');
            }

            $data->setTransaksi(
                $manager->getRepository(Transaksi::class)->find(
                    $request->get('hasil_transaksi')
                )
            );

            $data->setUser($this->get('security.token_storage')->getToken()->getUser());

            $manager->persist($data);
            $manager->flush();

            return $this->redirectToRoute('medical_hasil_list');
        }

        return $this->render('AppBundle:hasil:form.html.twig', [
            'transaksi' => $transaksi,
            'form' => $form->createView(),
            'title' => 'Tambah Hasil',
        ]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 21:55.
 */

namespace AppBundle\Controller\Pelanggan;

use AppBundle\Entity\Pelanggan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PelangganDeleteController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = $manager->getRepository(Pelanggan::class)->find($request->get('id'));

        try {
            $manager->remove($data);
            $manager->flush();

            return $this->redirectToRoute('medical_pelanggan_index');
        } catch (\Exception $e) {
            $this->get('session')->getFlashBag()->add('message', $e->getMessage());

            return $this->redirect($request->headers->get('referer'));
        }
    }
}

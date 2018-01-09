<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/01/18
 * Time: 22:15
 */

namespace AppBundle\Controller\Hasil;

use AppBundle\Entity\Hasil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HasilListAnalisController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(Hasil::class)->findBy([
            'isApproved' => 0
        ]);

        return $this->render('AppBundle:hasil:index.html.twig', [
            'hasil' => $data,
        ]);
    }

    public function approvedAction()
    {
        $data = $this->getDoctrine()->getRepository(Hasil::class)->findBy([
            'isApproved' => 1
        ]);

        return $this->render('AppBundle:hasil:index.html.twig', [
            'hasil' => $data,
        ]);
    }

    public function pendingAction()
    {
        $data = $this->getDoctrine()->getRepository(Hasil::class)->findBy([
            'isApproved' => null
        ]);

        return $this->render('AppBundle:hasil:index.html.twig', [
            'hasil' => $data,
        ]);
    }
}
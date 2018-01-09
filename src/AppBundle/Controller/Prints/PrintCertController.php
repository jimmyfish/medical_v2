<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 10/01/18
 * Time: 0:37
 */

namespace AppBundle\Controller\Prints;


use AppBundle\Entity\Transaksi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrintCertController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(Transaksi::class)->find($request->get('id'));

        return $this->render('AppBundle:print:cert.html.twig', [
            'data' => $data,
        ]);
    }
}
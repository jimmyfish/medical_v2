<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 09/01/18
 * Time: 23:47
 */

namespace AppBundle\Controller\Prints;


use AppBundle\Entity\Transaksi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PrintInvoiceController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(Transaksi::class)->find($request->get('id'));

        return $this->render('AppBundle:print:bukti.pembayaran.html.twig', [
            'data' => $data,
        ]);
    }
}
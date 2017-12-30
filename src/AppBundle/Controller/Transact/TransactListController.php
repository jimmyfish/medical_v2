<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 30/12/17
 * Time: 21:38
 */

namespace AppBundle\Controller\Transact;


use AppBundle\Entity\Transaksi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TransactListController extends Controller
{
    public function indexAction()
    {
        $transaksi = $this->getDoctrine()->getManager()
            ->getRepository(Transaksi::class)->findAll();

        return $this->render('AppBundle:transaksi:index.html.twig', [
            'transaksi' => $transaksi,
        ]);
    }
}
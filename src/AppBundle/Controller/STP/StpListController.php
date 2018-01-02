<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 02/01/18
 * Time: 19:26.
 */

namespace AppBundle\Controller\STP;

use AppBundle\Entity\Transaksi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StpListController extends Controller
{
    public function indexAction()
    {
        $transaksi = $this->getDoctrine()->getRepository(Transaksi::class)->findAll();

        return $this->render('AppBundle:stp:index.html.twig', [
            'transaksi' => $transaksi,
        ]);
    }
}

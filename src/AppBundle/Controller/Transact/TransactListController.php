<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 30/12/17
 * Time: 21:38.
 */

namespace AppBundle\Controller\Transact;

use AppBundle\Entity\Sampel;
use AppBundle\Entity\Transaksi;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class TransactListController extends Controller
{
    public function indexAction()
    {
        $manager = $this->getDoctrine()->getManager();

        $sampel = $manager->getRepository(Sampel::class)->findAll();

//        return new JsonResponse(Debug::dump($sampel[0]->getTransaksi()));

        $transaksi = $manager
            ->getRepository(Transaksi::class)->findAll();

        return $this->render('AppBundle:transaksi:index.html.twig', [
            'transaksi' => $transaksi,
        ]);
    }
}

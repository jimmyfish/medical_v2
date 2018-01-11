<?php

namespace AppBundle\Controller\Transact;

use AppBundle\Entity\Hasil;
use AppBundle\Entity\Pelanggan;
use AppBundle\Entity\Sampel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Transaksi;

class TransactDeleteController extends Controller
{
	public function indexAction(Request $request)
	{
		$manager = $this->getDoctrine()->getManager();

		$data = $manager->getRepository(Transaksi::class)->find($request->get('id'));

		if ($data instanceOf Transaksi)
		{
//		    $sampel = $manager->getRepository(Sampel::class)->find($data->getSampel()->getId());
//
//		    if ($sampel instanceof Sampel) {
//		        $manager->remove($sampel);
//            }
//
//            $pelanggan = $manager->getRepository(Pelanggan::class)->find($data->getPelanggan()->getId());
//
//            if ($pelanggan instanceof Pelanggan) {
//                $manager->remove($pelanggan);
//            }
//
//            if ($data->getHasil() != null) {
//                $hasil = $manager->getRepository(Sampel::class)->find($data->getHasil()->getId());
//
//                if ($hasil instanceof Hasil) {
//                    $manager->remove($hasil);
//                }
//            }
            $manager->remove($data);

            $manager->flush();

            return $this->redirectToRoute('medical_transact_list');
		}
	}
}
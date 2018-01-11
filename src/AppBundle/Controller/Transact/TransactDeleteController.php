<?php

namespace AppBundle\Controller\Transact;

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

		}
	}
}
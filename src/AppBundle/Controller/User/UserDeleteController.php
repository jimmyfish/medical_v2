<?php

namespace AppBundle\Controller\User;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserDeleteController extends Controller
{
	public function indexAction(Request $request)
	{
		$manager = $this->getDoctrine()->getManager();

		// MENGAMBIL DATA SESUAI DENGAN ID PENGGUNA YANG DIMINTA
		$data = $this->getDoctrine()->getRepository(User::class)->find($request->get('id'));

		try {
			// MEMBERI PERINTAH PADA ORM UNTUK MENGHAPUS DATA
			$manager->remove($data);
			$manager->flush();

			$this->addFlash('message_succcess', 'Data berhasil dihapus');

		} catch (\Exception $e) {
			return new Response($e->getMessage());
		}

		return $this->redirect($request->headers->get('referer'));
	}

}
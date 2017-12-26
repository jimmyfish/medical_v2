<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 21:50.
 */

namespace AppBundle\Controller\Pelanggan;

use AppBundle\Entity\Pelanggan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PelangganListController extends Controller
{
    public function indexAction()
    {
        $data = $this->getDoctrine()->getManager()
            ->getRepository(Pelanggan::class)->findAll();

        return $this->render('AppBundle:pelanggan:index.html.twig', [
            'pelanggan' => $data,
        ]);
    }
}

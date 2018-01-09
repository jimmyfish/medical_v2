<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 03/01/18
 * Time: 3:14
 */

namespace AppBundle\Controller\Hasil;


use AppBundle\Entity\Hasil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HasilListController extends Controller
{
    public function indexAction()
    {
        $hasil = $this->getDoctrine()->getRepository(Hasil::class)->findBy([
            'isApproved' => [null, 1],
        ]);

        return $this->render('AppBundle:hasil:index.html.twig', [
            'hasil' => $hasil,
        ]);
    }
}
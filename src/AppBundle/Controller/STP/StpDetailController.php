<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 02/01/18
 * Time: 19:34.
 */

namespace AppBundle\Controller\STP;

use AppBundle\Entity\Transaksi;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class StpDetailController extends Controller
{
    public function indexAction(Request $request, $id)
    {
        $data = $this->getDoctrine()->getRepository(Transaksi::class)->find($id);

        return $this->render('AppBundle:stp:detail.html.twig', [
            'data' => $data,
        ]);
    }
}

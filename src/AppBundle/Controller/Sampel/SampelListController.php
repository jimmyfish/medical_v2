<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/01/18
 * Time: 22:27
 */

namespace AppBundle\Controller\Sampel;


use AppBundle\Entity\Sampel;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SampelListController extends Controller
{
    public function indexAction()
    {
        $data = $this->getDoctrine()->getRepository(Sampel::class)->findAll();

        return $this->render('AppBundle:sampel:index.html.twig', [
            'sampel' => $data,
        ]);
    }
}
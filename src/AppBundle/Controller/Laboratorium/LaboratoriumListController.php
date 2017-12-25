<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 3:47.
 */

namespace AppBundle\Controller\Laboratorium;

use AppBundle\Entity\Laboratorium;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LaboratoriumListController extends Controller
{
    public function indexAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository(Laboratorium::class)->findAll();

        return $this->render('AppBundle:lab:index.html.twig', [
            'lab' => $data,
        ]);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/01/18
 * Time: 2:38
 */

namespace AppBundle\Controller\Laboratorium;


use AppBundle\Entity\Laboratorium;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LaboratoriumDeleteController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $data = $manager->getRepository(Laboratorium::class)->find($request->get('id'));

        if ($data instanceof Laboratorium) {
            $manager->remove($data);
            $manager->flush();

            return $this->redirectToRoute('medical_lab_index');
        }
    }
}
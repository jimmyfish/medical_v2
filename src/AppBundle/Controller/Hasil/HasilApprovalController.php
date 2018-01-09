<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 04/01/18
 * Time: 20:52
 */

namespace AppBundle\Controller\Hasil;


use AppBundle\Entity\Hasil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HasilApprovalController extends Controller
{
    public function refuseAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = $manager->getRepository(Hasil::class)->find($request->get('hasil_id'));

        if ($data instanceof Hasil) {
            $data->setIsApproved(0);
            $data->setApprovedBy($this->get('security.token_storage')->getToken()->getUser());
            $data->setAlasan($request->get('alasan'));

            $manager->persist($data);

            try {
                $manager->flush();
            } catch (\Exception $e) {

            }

            return $this->redirect($request->headers->get('referer'));
        }

        return 'GO AWAY';
    }

    public function approveAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $data = $manager->getRepository(Hasil::class)->find($request->get('hasil_id'));

        if ($data instanceof Hasil) {
            $data->setIsApproved(1);
            $data->setApprovedBy($this->get('security.token_storage')->getToken()->getUser());

            $manager->persist($data);

            try {
                $manager->flush();
            } catch (\Exception $e) {

            }

            return $this->redirect($request->headers->get('referer'));
        }
    }
}
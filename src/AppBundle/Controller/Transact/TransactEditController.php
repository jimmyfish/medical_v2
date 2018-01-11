<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 12/01/18
 * Time: 0:29
 */

namespace AppBundle\Controller\Transact;


use AppBundle\Entity\Laboratorium;
use AppBundle\Entity\Pelanggan;
use AppBundle\Entity\Sampel;
use AppBundle\Entity\Transaksi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TransactEditController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $info['lab'] = $manager->getRepository(Laboratorium::class)->findAll();
        $info['data'] = $manager->getRepository(Transaksi::class)->find($request->get('id'));

        if ($info['data'] instanceof Transaksi) {
            if ($request->getMethod() === 'POST') {
                /*
                 * Starting with Pelanggan
                 */
                $pelanggan = $manager->getRepository(Pelanggan::class)->find($info['data']->getPelanggan()->getId());

                if ($pelanggan instanceof Pelanggan) {
                    $pelanggan->setNama($request->get('pelanggan_name'));
                    $pelanggan->setAlamat($request->get('pelanggan_address'));
                    $pelanggan->setTelepon($request->get('pelanggan_telepon'));
                    $manager->persist($pelanggan);
                }

                /**
                 * Now with Sampel.
                 */
                $sampel = $manager->getRepository(Sampel::class)->find($info['data']->getSampel()->getId());

                $date = \DateTime::createFromFormat('j/m/y', $request->get('sampel_tanggal_pengambilan'));

                $lab = $manager->getRepository(Laboratorium::class)->find(
                    $request->get('lab_id')
                );

                if ($sampel instanceof Sampel) {
                    $sampel->setIdLab($lab);
                    $sampel->setLokasiPengambilan($request->get('sampel_lokasi'));
                    $sampel->setAlamat($request->get('sampel_alamat_lokasi'));
                    $sampel->setPetugasPengambil($request->get('sampel_petugas'));
                    $sampel->setTanggal($date);
                    $sampel->setKondisi($request->get('sampel_kondisi'));
                    $sampel->setJenisSampel($request->get('sampel_jenis'));
                    $sampel->setParameter($request->get('sampel_parameter'));
                    $sampel->setMetodePengambilan($request->get('metode_pengambilan'));

                    $manager->persist($sampel);
                }

                /**
                 * Last is Transact.
                 */
                $transact = $info['data'];

                if ($transact instanceof Transaksi) {
                    $transact->setBiaya($request->get('biaya'));
                    $dateHasil = \DateTime::createFromFormat('j/m/y', $request->get('tanggal_pengambilan_hasil'));
                    $transact->setTanggalPengambilanHasil($dateHasil);
                    $transact->setUser($this->get('security.token_storage')->getToken()->getUser());

                    $manager->persist($transact);
                }

                $manager->flush();

                return $this->redirectToRoute('medical_transact_list');
            }
        }

        return $this->render('AppBundle:transaksi:edit.html.twig', [
            'info' => $info,
            'title' => 'Edit Transaksi',
        ]);
    }
}
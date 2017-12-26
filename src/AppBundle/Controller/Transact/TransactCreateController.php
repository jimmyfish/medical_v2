<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 26/12/17
 * Time: 22:43.
 */

namespace AppBundle\Controller\Transact;

use AppBundle\Entity\Laboratorium;
use AppBundle\Entity\Pelanggan;
use AppBundle\Entity\Sampel;
use AppBundle\Entity\Transaksi;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactCreateController extends Controller
{
    public function indexAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();

        $info['lab'] = $manager->getRepository(Laboratorium::class)->findAll();

        if ('POST' === $request->getMethod()) {

            /*
             * Starting with Pelanggan
             */
            $pelanggan = new Pelanggan();

            $pelanggan->setNama($request->get('pelanggan_name'));
            $pelanggan->setAlamat($request->get('pelanggan_address'));
            $pelanggan->setTelepon($request->get('pelanggan_telepon'));

            $manager->persist($pelanggan);

            /**
             * Now with Sampel
             */
            $sampel = new Sampel();
            $date = \DateTime::createFromFormat('j/m/y', $request->get('sampel_tanggal_pengambilan'));

            $lab = $manager->getRepository(Laboratorium::class)->find(
                $request->get('lab_id')
            );

            $sampel->setIdLab($lab);
            $sampel->setLokasiPengambilan($request->get('sampel_lokasi'));
            $sampel->setAlamat($request->get('sampel_alamat_lokasi'));
            $sampel->setPetugasPengambil($request->get('sampel_petugas'));
            $sampel->setTanggal($date);
            $sampel->setKondisi($request->get('sampel_kondisi'));
            $sampel->setJenisSampel($request->get('sampel_jenis'));
            $sampel->setParameter($request->get('sampel_parameter'));

            $manager->persist($sampel);
            $manager->flush();

            $kodeLab = $lab->getKodeLab() . '-00' .$sampel->getId();

            $sampel->setKodeSampel($kodeLab);

            $manager->persist($sampel);
            $manager->flush();

            /**
             * Last is Transact
             */
            $transact = new Transaksi();

            $transact->setBiaya($request->get('biaya'));
            $dateHasil = \DateTime::createFromFormat('j/m/y', $request->get('tanggal_pengambilan_hasil'));
            $transact->setTanggalPengambilanHasil($dateHasil);
            $transact->setIdSampel($sampel);
            $transact->setIdPelanggan($pelanggan);

            $manager->persist($transact);
            $manager->flush();

            return new JsonResponse(Debug::dump($transact));
        }

        return $this->render('AppBundle:transaksi:form.html.twig', [
            'title' => 'Tambah Transaksi',
            'info' => $info,
        ]);
    }
}

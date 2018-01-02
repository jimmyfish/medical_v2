<?php

namespace AppBundle\Entity;

/**
 * Transaksi.
 */
class Transaksi
{
    private $id;

    private $biaya;

    private $tanggalPengambilanHasil;

    private $sampel;

    private $pelanggan;

    private $hasil = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBiaya()
    {
        return $this->biaya;
    }

    /**
     * @param mixed $biaya
     */
    public function setBiaya($biaya)
    {
        $this->biaya = $biaya;
    }

    /**
     * @return mixed
     */
    public function getTanggalPengambilanHasil()
    {
        return $this->tanggalPengambilanHasil;
    }

    /**
     * @param mixed $tanggalPengambilanHasil
     */
    public function setTanggalPengambilanHasil($tanggalPengambilanHasil)
    {
        $this->tanggalPengambilanHasil = $tanggalPengambilanHasil;
    }

    /**
     * @return mixed
     */
    public function getSampel()
    {
        return $this->sampel;
    }

    /**
     * @param mixed $sampel
     */
    public function setSampel(Sampel $sampel)
    {
        $this->sampel = $sampel;
    }

    /**
     * @return mixed
     */
    public function getPelanggan()
    {
        return $this->pelanggan;
    }

    /**
     * @param Pelanggan $pelanggan
     */
    public function setPelanggan(Pelanggan $pelanggan)
    {
        $this->pelanggan = $pelanggan;
    }

    /**
     * @return mixed
     */
    public function getHasil()
    {
        return $this->hasil;
    }

    /**
     * @param mixed $hasil
     */
    public function setHasil(Hasil $hasil)
    {
        $this->hasil = $hasil;
    }

    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function __toString()
    {
        return $this->id;
    }
}

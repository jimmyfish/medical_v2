<?php

namespace AppBundle\Entity;

/**
 * Hasil.
 */
class Hasil
{
    private $id;

    private $satuan;

    private $parameter;

    private $metodeAnalisa;

    private $bakuMutu;

    private $hasil;

    private $idPelanggan;

    private $idSampel;

    private $idLab;

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
    public function getSatuan()
    {
        return $this->satuan;
    }

    /**
     * @param mixed $satuan
     */
    public function setSatuan($satuan)
    {
        $this->satuan = $satuan;
    }

    /**
     * @return mixed
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param mixed $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return mixed
     */
    public function getMetodeAnalisa()
    {
        return $this->metodeAnalisa;
    }

    /**
     * @param mixed $metodeAnalisa
     */
    public function setMetodeAnalisa($metodeAnalisa)
    {
        $this->metodeAnalisa = $metodeAnalisa;
    }

    /**
     * @return mixed
     */
    public function getBakuMutu()
    {
        return $this->bakuMutu;
    }

    /**
     * @param mixed $bakuMutu
     */
    public function setBakuMutu($bakuMutu)
    {
        $this->bakuMutu = $bakuMutu;
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
    public function setHasil($hasil)
    {
        $this->hasil = $hasil;
    }

    /**
     * @return mixed
     */
    public function getIdPelanggan()
    {
        return $this->idPelanggan;
    }

    /**
     * @param mixed $idPelanggan
     */
    public function setIdPelanggan($idPelanggan)
    {
        $this->idPelanggan = $idPelanggan;
    }

    /**
     * @return mixed
     */
    public function getIdSampel()
    {
        return $this->idSampel;
    }

    /**
     * @param mixed $idSampel
     */
    public function setIdSampel($idSampel)
    {
        $this->idSampel = $idSampel;
    }

    /**
     * @return mixed
     */
    public function getIdLab()
    {
        return $this->idLab;
    }

    /**
     * @param mixed $idLab
     */
    public function setIdLab($idLab)
    {
        $this->idLab = $idLab;
    }

    private $isApproved = null;

    private $alasan;

    private $keterangan;

    /**
     * @return mixed
     */
    public function getisApproved()
    {
        return $this->isApproved;
    }

    /**
     * @param mixed $isApproved
     */
    public function setIsApproved($isApproved)
    {
        $this->isApproved = $isApproved;
    }

    /**
     * @return mixed
     */
    public function getAlasan()
    {
        return $this->alasan;
    }

    /**
     * @param mixed $alasan
     */
    public function setAlasan($alasan)
    {
        $this->alasan = $alasan;
    }

    /**
     * @return mixed
     */
    public function getKeterangan()
    {
        return $this->keterangan;
    }

    /**
     * @param mixed $keterangan
     */
    public function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }

    private $transaksi;

    /**
     * @return mixed
     */
    public function getTransaksi()
    {
        return $this->transaksi;
    }

    /**
     * @param mixed $transaksi
     */
    public function setTransaksi(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
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

    private $approvedBy = null;

    /**
     * @return User
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * @param User $approvedBy
     */
    public function setApprovedBy(User $approvedBy)
    {
        $this->approvedBy = $approvedBy;
    }
}

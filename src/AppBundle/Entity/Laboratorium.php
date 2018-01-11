<?php

namespace AppBundle\Entity;

/**
 * Laboratorium.
 */
class Laboratorium
{
    private $id;

    private $namaLab;

    private $jenisLab;

    private $idUser;

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
    public function getNamaLab()
    {
        return $this->namaLab;
    }

    /**
     * @param mixed $namaLab
     */
    public function setNamaLab($namaLab)
    {
        $this->namaLab = $namaLab;
    }

    /**
     * @return mixed
     */
    public function getJenisLab()
    {
        return $this->jenisLab;
    }

    /**
     * @param mixed $jenisLab
     */
    public function setJenisLab($jenisLab)
    {
        $this->jenisLab = $jenisLab;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser(User $idUser)
    {
        $this->idUser = $idUser;
    }

    private $kodeLab;

    /**
     * @return mixed
     */
    public function getKodeLab()
    {
        return $this->kodeLab;
    }

    /**
     * @param mixed $kodeLab
     */
    public function setKodeLab($kodeLab)
    {
        $this->kodeLab = $kodeLab;
    }

    private $sampel;

    /**
     * @return mixed
     */
    public function getSampel()
    {
        return $this->sampel;
    }
}

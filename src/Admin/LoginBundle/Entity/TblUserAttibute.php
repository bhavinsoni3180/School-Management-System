<?php

namespace Admin\LoginBundle\Entity;

/**
 * TblUserAttibute
 */
class TblUserAttibute
{
    /**
     * @var string
     */
    private $vattibutename;

    /**
     * @var string
     */
    private $vattibutecode;

    /**
     * @var string
     */
    private $vattibutetype;

    /**
     * @var string
     */
    private $estatus = '1';

    /**
     * @var string
     */
    private $edelete = '0';

    /**
     * @var \DateTime
     */
    private $dcreteddate;

    /**
     * @var \DateTime
     */
    private $tmodifydate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $icreatedby;

    /**
     * @var int
     */
    private $ideletedby;

    /**
     * @var int
     */
    private $biattibuteid;


    /**
     * Set vattibutename.
     *
     * @param string $vattibutename
     *
     * @return TblUserAttibute
     */
    public function setVattibutename($vattibutename)
    {
        $this->vattibutename = $vattibutename;

        return $this;
    }

    /**
     * Get vattibutename.
     *
     * @return string
     */
    public function getVattibutename()
    {
        return $this->vattibutename;
    }

    /**
     * Set vattibutecode.
     *
     * @param string $vattibutecode
     *
     * @return TblUserAttibute
     */
    public function setVattibutecode($vattibutecode)
    {
        $this->vattibutecode = $vattibutecode;

        return $this;
    }

    /**
     * Get vattibutecode.
     *
     * @return string
     */
    public function getVattibutecode()
    {
        return $this->vattibutecode;
    }

    /**
     * Set vattibutetype.
     *
     * @param string $vattibutetype
     *
     * @return TblUserAttibute
     */
    public function setVattibutetype($vattibutetype)
    {
        $this->vattibutetype = $vattibutetype;

        return $this;
    }

    /**
     * Get vattibutetype.
     *
     * @return string
     */
    public function getVattibutetype()
    {
        return $this->vattibutetype;
    }

    /**
     * Set estatus.
     *
     * @param string $estatus
     *
     * @return TblUserAttibute
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus.
     *
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set edelete.
     *
     * @param string $edelete
     *
     * @return TblUserAttibute
     */
    public function setEdelete($edelete)
    {
        $this->edelete = $edelete;

        return $this;
    }

    /**
     * Get edelete.
     *
     * @return string
     */
    public function getEdelete()
    {
        return $this->edelete;
    }

    /**
     * Set dcreteddate.
     *
     * @param \DateTime $dcreteddate
     *
     * @return TblUserAttibute
     */
    public function setDcreteddate($dcreteddate)
    {
        $this->dcreteddate = $dcreteddate;

        return $this;
    }

    /**
     * Get dcreteddate.
     *
     * @return \DateTime
     */
    public function getDcreteddate()
    {
        return $this->dcreteddate;
    }

    /**
     * Set tmodifydate.
     *
     * @param \DateTime $tmodifydate
     *
     * @return TblUserAttibute
     */
    public function setTmodifydate($tmodifydate)
    {
        $this->tmodifydate = $tmodifydate;

        return $this;
    }

    /**
     * Get tmodifydate.
     *
     * @return \DateTime
     */
    public function getTmodifydate()
    {
        return $this->tmodifydate;
    }

    /**
     * Set icreatedby.
     *
     * @param int $icreatedby
     *
     * @return TblUserAttibute
     */
    public function setIcreatedby($icreatedby)
    {
        $this->icreatedby = $icreatedby;

        return $this;
    }

    /**
     * Get icreatedby.
     *
     * @return int
     */
    public function getIcreatedby()
    {
        return $this->icreatedby;
    }

    /**
     * Set ideletedby.
     *
     * @param int $ideletedby
     *
     * @return TblUserAttibute
     */
    public function setIdeletedby($ideletedby)
    {
        $this->ideletedby = $ideletedby;

        return $this;
    }

    /**
     * Get ideletedby.
     *
     * @return int
     */
    public function getIdeletedby()
    {
        return $this->ideletedby;
    }

    /**
     * Get biattibuteid.
     *
     * @return int
     */
    public function getBiattibuteid()
    {
        return $this->biattibuteid;
    }
}

<?php

namespace Admin\LoginBundle\Entity;

/**
 * TblUserAttibuteValue
 */
class TblUserAttibuteValue
{
    /**
     * @var int
     */
    private $iattibuteid;

    /**
     * @var int
     */
    private $biuserid;

    /**
     * @var string
     */
    private $vvalue;

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
    private $iattibutevalueid;


    /**
     * Set iattibuteid.
     *
     * @param int $iattibuteid
     *
     * @return TblUserAttibuteValue
     */
    public function setIattibuteid($iattibuteid)
    {
        $this->iattibuteid = $iattibuteid;

        return $this;
    }

    /**
     * Get iattibuteid.
     *
     * @return int
     */
    public function getIattibuteid()
    {
        return $this->iattibuteid;
    }

    /**
     * Set biuserid.
     *
     * @param int $biuserid
     *
     * @return TblUserAttibuteValue
     */
    public function setBiuserid($biuserid)
    {
        $this->biuserid = $biuserid;

        return $this;
    }

    /**
     * Get biuserid.
     *
     * @return int
     */
    public function getBiuserid()
    {
        return $this->biuserid;
    }

    /**
     * Set vvalue.
     *
     * @param string $vvalue
     *
     * @return TblUserAttibuteValue
     */
    public function setVvalue($vvalue)
    {
        $this->vvalue = $vvalue;

        return $this;
    }

    /**
     * Get vvalue.
     *
     * @return string
     */
    public function getVvalue()
    {
        return $this->vvalue;
    }

    /**
     * Set estatus.
     *
     * @param string $estatus
     *
     * @return TblUserAttibuteValue
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
     * @return TblUserAttibuteValue
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
     * @return TblUserAttibuteValue
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
     * @return TblUserAttibuteValue
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
     * @return TblUserAttibuteValue
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
     * @return TblUserAttibuteValue
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
     * Get iattibutevalueid.
     *
     * @return int
     */
    public function getIattibutevalueid()
    {
        return $this->iattibutevalueid;
    }
}

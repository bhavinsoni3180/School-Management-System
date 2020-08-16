<?php

namespace Admin\LoginBundle\Entity;

/**
 * TblParent
 */
class TblParent
{
    /**
     * @var int
     */
    private $biuserroleid;

    /**
     * @var string
     */
    private $vusername;

    /**
     * @var string
     */
    private $vpassword;

    /**
     * @var string
     */
    private $vfirstname;

    /**
     * @var string
     */
    private $vlastname;

    /**
     * @var string
     */
    private $vemail;

    /**
     * @var string
     */
    private $vphone;

    /**
     * @var string|null
     */
    private $vuid;

    /**
     * @var string
     */
    private $estatus = '1';

    /**
     * @var string
     */
    private $edelete = '0';

    /**
     * @var int
     */
    private $icreatedby;

    /**
     * @var \DateTime
     */
    private $dcreateddate;

    /**
     * @var \DateTime
     */
    private $tmodifydate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $ideletedby;

    /**
     * @var int
     */
    private $biperentid;


    /**
     * Set biuserroleid.
     *
     * @param int $biuserroleid
     *
     * @return TblParent
     */
    public function setBiuserroleid($biuserroleid)
    {
        $this->biuserroleid = $biuserroleid;

        return $this;
    }

    /**
     * Get biuserroleid.
     *
     * @return int
     */
    public function getBiuserroleid()
    {
        return $this->biuserroleid;
    }

    /**
     * Set vusername.
     *
     * @param string $vusername
     *
     * @return TblParent
     */
    public function setVusername($vusername)
    {
        $this->vusername = $vusername;

        return $this;
    }

    /**
     * Get vusername.
     *
     * @return string
     */
    public function getVusername()
    {
        return $this->vusername;
    }

    /**
     * Set vpassword.
     *
     * @param string $vpassword
     *
     * @return TblParent
     */
    public function setVpassword($vpassword)
    {
        $this->vpassword = $vpassword;

        return $this;
    }

    /**
     * Get vpassword.
     *
     * @return string
     */
    public function getVpassword()
    {
        return $this->vpassword;
    }

    /**
     * Set vfirstname.
     *
     * @param string $vfirstname
     *
     * @return TblParent
     */
    public function setVfirstname($vfirstname)
    {
        $this->vfirstname = $vfirstname;

        return $this;
    }

    /**
     * Get vfirstname.
     *
     * @return string
     */
    public function getVfirstname()
    {
        return $this->vfirstname;
    }

    /**
     * Set vlastname.
     *
     * @param string $vlastname
     *
     * @return TblParent
     */
    public function setVlastname($vlastname)
    {
        $this->vlastname = $vlastname;

        return $this;
    }

    /**
     * Get vlastname.
     *
     * @return string
     */
    public function getVlastname()
    {
        return $this->vlastname;
    }

    /**
     * Set vemail.
     *
     * @param string $vemail
     *
     * @return TblParent
     */
    public function setVemail($vemail)
    {
        $this->vemail = $vemail;

        return $this;
    }

    /**
     * Get vemail.
     *
     * @return string
     */
    public function getVemail()
    {
        return $this->vemail;
    }

    /**
     * Set vphone.
     *
     * @param string $vphone
     *
     * @return TblParent
     */
    public function setVphone($vphone)
    {
        $this->vphone = $vphone;

        return $this;
    }

    /**
     * Get vphone.
     *
     * @return string
     */
    public function getVphone()
    {
        return $this->vphone;
    }

    /**
     * Set vuid.
     *
     * @param string|null $vuid
     *
     * @return TblParent
     */
    public function setVuid($vuid = null)
    {
        $this->vuid = $vuid;

        return $this;
    }

    /**
     * Get vuid.
     *
     * @return string|null
     */
    public function getVuid()
    {
        return $this->vuid;
    }

    /**
     * Set estatus.
     *
     * @param string $estatus
     *
     * @return TblParent
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
     * @return TblParent
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
     * Set icreatedby.
     *
     * @param int $icreatedby
     *
     * @return TblParent
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
     * Set dcreateddate.
     *
     * @param \DateTime $dcreateddate
     *
     * @return TblParent
     */
    public function setDcreateddate($dcreateddate)
    {
        $this->dcreateddate = $dcreateddate;

        return $this;
    }

    /**
     * Get dcreateddate.
     *
     * @return \DateTime
     */
    public function getDcreateddate()
    {
        return $this->dcreateddate;
    }

    /**
     * Set tmodifydate.
     *
     * @param \DateTime $tmodifydate
     *
     * @return TblParent
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
     * Set ideletedby.
     *
     * @param int $ideletedby
     *
     * @return TblParent
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
     * Get biperentid.
     *
     * @return int
     */
    public function getBiperentid()
    {
        return $this->biperentid;
    }
}

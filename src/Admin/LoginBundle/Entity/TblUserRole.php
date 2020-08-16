<?php

namespace Admin\LoginBundle\Entity;

/**
 * TblUserRole
 */
class TblUserRole
{
    /**
     * @var string
     */
    private $vrole;

    /**
     * @var string
     */
    private $estutes = '1';

    /**
     * @var string
     */
    private $edelete = '0';

    /**
     * @var \DateTime
     */
    private $dcrerateddate;

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
     * @var string
     */
    private $vroleaccess;

    /**
     * @var int
     */
    private $biuserroleid;


    /**
     * Set vrole.
     *
     * @param string $vrole
     *
     * @return TblUserRole
     */
    public function setVrole($vrole)
    {
        $this->vrole = $vrole;

        return $this;
    }

    /**
     * Get vrole.
     *
     * @return string
     */
    public function getVrole()
    {
        return $this->vrole;
    }

    /**
     * Set estutes.
     *
     * @param string $estutes
     *
     * @return TblUserRole
     */
    public function setEstutes($estutes)
    {
        $this->estutes = $estutes;

        return $this;
    }

    /**
     * Get estutes.
     *
     * @return string
     */
    public function getEstutes()
    {
        return $this->estutes;
    }

    /**
     * Set edelete.
     *
     * @param string $edelete
     *
     * @return TblUserRole
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
     * Set dcrerateddate.
     *
     * @param \DateTime $dcrerateddate
     *
     * @return TblUserRole
     */
    public function setDcrerateddate($dcrerateddate)
    {
        $this->dcrerateddate = $dcrerateddate;

        return $this;
    }

    /**
     * Get dcrerateddate.
     *
     * @return \DateTime
     */
    public function getDcrerateddate()
    {
        return $this->dcrerateddate;
    }

    /**
     * Set tmodifydate.
     *
     * @param \DateTime $tmodifydate
     *
     * @return TblUserRole
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
     * @return TblUserRole
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
     * @return TblUserRole
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
     * Set vroleaccess.
     *
     * @param string $vroleaccess
     *
     * @return TblUserRole
     */
    public function setVroleaccess($vroleaccess)
    {
        $this->vroleaccess = $vroleaccess;

        return $this;
    }

    /**
     * Get vroleaccess.
     *
     * @return string
     */
    public function getVroleaccess()
    {
        return $this->vroleaccess;
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
}

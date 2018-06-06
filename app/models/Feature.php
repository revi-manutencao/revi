<?php  defined('INITIALIZED') OR exit('You cannot access this file directly');

class Feature extends Model{
    private $id;
    private $name;
    private $shortdescription;
    private $longdescription;
    private $active;
    private $idPhase;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }

    /**
     * @param mixed $shortdescription
     */
    public function setShortdescription($shortdescription)
    {
        $this->shortdescription = $shortdescription;
    }

    /**
     * @return mixed
     */
    public function getLongdescription()
    {
        return $this->longdescription;
    }

    /**
     * @param mixed $longdescription
     */
    public function setLongdescription($longdescription)
    {
        $this->longdescription = $longdescription;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getIdPhase()
    {
        return $this->idPhase;
    }

    /**
     * @param mixed $idPhase
     */
    public function setIdPhase($idPhase)
    {
        $this->idPhase = $idPhase;
    }
    
}
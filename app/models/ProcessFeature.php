<?php

class ProcessFeature extends Model{
    private $id;
    private $idProcess;
    private $idFeature;

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
    public function getIdProcess()
    {
        return $this->idProcess;
    }

    /**
     * @param mixed $idProcess
     */
    public function setIdProcess($idProcess)
    {
        $this->idProcess = $idProcess;
    }

    /**
     * @return mixed
     */
    public function getIdFeature()
    {
        return $this->idFeature;
    }

    /**
     * @param mixed $idFeature
     */
    public function setIdFeature($idFeature)
    {
        $this->idFeature = $idFeature;
    }

}
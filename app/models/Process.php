<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:14
 */

class Process extends BaseModel{
        private $idTasksManagement;
        private $idPeopleManagement;
        private $idDeliveryMethod;
        private $idUser;
        private $idDevcycleStruture;
        private $idMetricsMethod;
        private $idDevcycleTime;

    /**
     * @return mixed
     */
    public function getIdTasksManagement()
    {
        return $this->idTasksManagement;
    }

    /**
     * @param mixed $idTasksManagement
     */
    public function setIdTasksManagement($idTasksManagement)
    {
        $this->idTasksManagement = $idTasksManagement;
    }

    /**
     * @return mixed
     */
    public function getIdPeopleManagement()
    {
        return $this->idPeopleManagement;
    }

    /**
     * @param mixed $idPeopleManagement
     */
    public function setIdPeopleManagement($idPeopleManagement)
    {
        $this->idPeopleManagement = $idPeopleManagement;
    }

    /**
     * @return mixed
     */
    public function getIdDeliveryMethod()
    {
        return $this->idDeliveryMethod;
    }

    /**
     * @param mixed $idDeliveryMethod
     */
    public function setIdDeliveryMethod($idDeliveryMethod)
    {
        $this->idDeliveryMethod = $idDeliveryMethod;
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
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getIdDevcycleStruture()
    {
        return $this->idDevcycleStruture;
    }

    /**
     * @param mixed $idDevcycleStruture
     */
    public function setIdDevcycleStruture($idDevcycleStruture)
    {
        $this->idDevcycleStruture = $idDevcycleStruture;
    }

    /**
     * @return mixed
     */
    public function getIdMetricsMethod()
    {
        return $this->idMetricsMethod;
    }

    /**
     * @param mixed $idMetricsMethod
     */
    public function setIdMetricsMethod($idMetricsMethod)
    {
        $this->idMetricsMethod = $idMetricsMethod;
    }

    /**
     * @return mixed
     */
    public function getIdDevcycleTime()
    {
        return $this->idDevcycleTime;
    }

    /**
     * @param mixed $idDevcycleTime
     */
    public function setIdDevcycleTime($idDevcycleTime)
    {
        $this->idDevcycleTime = $idDevcycleTime;
    }



    /**
     * Process constructor.
     */
}
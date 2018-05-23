<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:25
 */

class PeopleManagementFeatures extends BaseModel
{
    private $idPeopleManagement;

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

}
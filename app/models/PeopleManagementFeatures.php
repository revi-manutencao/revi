<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:25
 */

class PeopleManagementFeatures extends BaseModel
{
    public $tableName = 'people_management_features';
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
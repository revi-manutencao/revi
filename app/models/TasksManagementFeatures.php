<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:25
 */

class TasksManagementFeatures extends BaseModel
{
    private $idTasksManagement;

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

}
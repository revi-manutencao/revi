<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:27
 */

class DevcycleTimeFeatures extends BaseModel
{
    public $tableName = 'devcycle_time_features';
    private $idDevcycleTime;

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

}
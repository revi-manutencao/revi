<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:26
 */

class DevcycleStructureFeatures extends BaseModel
{
    private $idDevcycleStructure;

    /**
     * @return mixed
     */
    public function getIdDevcycleStructure()
    {
        return $this->idDevcycleStructure;
    }

    /**
     * @param mixed $idDevcycleStructure
     */
    public function setIdDevcycleStructure($idDevcycleStructure)
    {
        $this->idDevcycleStructure = $idDevcycleStructure;
    }


}
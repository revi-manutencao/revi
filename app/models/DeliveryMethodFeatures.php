<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:25
 */

class DeliveryMethodFeatures extends BaseModel
{
    private $idDeliveryMethod;

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
    public function getDeliveryMethodFeatures()
    {
        return $this->DeliveryMethodFeatures;
    }

    /**
     * @param mixed $DeliveryMethodFeatures
     */
    public function setDeliveryMethodFeatures($DeliveryMethodFeatures)
    {
        $this->DeliveryMethodFeatures = $DeliveryMethodFeatures;
    }
    private $DeliveryMethodFeatures;
}
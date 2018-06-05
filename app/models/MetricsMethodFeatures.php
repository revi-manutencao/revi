<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 21/05/18
 * Time: 22:26
 */

class MetricsMethodFeatures extends BaseModel
{
    public $tableName = 'metrics_method_features';
    private $idMetricsMethod;

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

}
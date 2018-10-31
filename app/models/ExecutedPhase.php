<?php defined('INITIALIZED') OR exit('You cannot access this file directly');

class ExecutedPhase extends Model
{
    private $id;
    private $phase_id;
    private $process_id;
    private $updated_at;
    private $executed;

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
    public function getPhaseId()
    {
        return $this->phase_id;
    }

    /**
     * @param mixed $phase_id
     */
    public function setPhaseId($phase_id)
    {
        $this->phase_id = $phase_id;
    }

    /**
     * @return mixed
     */
    public function getProcessId()
    {
        return $this->process_id;
    }

    /**
     * @param mixed $process_id
     */
    public function setProcessId($process_id)
    {
        $this->process_id = $process_id;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * @param mixed $executed
     */
    public function setExecuted($executed)
    {
        $this->executed = $executed;
    }


}
<?php

namespace App\ListenerLayer;

use Symfony\Component\EventDispatcher\Event;


class PatientEvent extends Event {

  public const EventName = 'patient.request.event';

  private $payload;
  private $result;
  private $type;

  public function getResult()
  {
    return $this->result;
  }


  public function setResult($result)
  {
    $this->result = $result;

    return $this;
  }

  /**
  * Get the value of Type
  *
  * @return mixed
  */
  public function getType()
  {
    return $this->type;
  }

  /**
  * Set the value of Type
  *
  * @param mixed type
  *
  * @return self
  */
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }


    /**
     * Get the value of Payload
     *
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Set the value of Payload
     *
     * @param mixed payload
     *
     * @return self
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

}

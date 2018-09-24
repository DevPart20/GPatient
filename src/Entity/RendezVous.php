<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="App\Repository\RendezVousRepository")
*/
class RendezVous
{
  /**
  * @ORM\Id()
  * @ORM\GeneratedValue()
  * @ORM\Column(type="integer")
  */
  private $id;


 /** @ORM\Column(type="datetime") */
  private $datetime;

  /**
  * @ORM\ManyToOne(targetEntity="Patient")
  * @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
  */
  private $patient;





  /**
  * Get the value of Id
  *
  * @return mixed
  */
  public function getId()
  {
    return $this->id;
  }

  /**
  * Set the value of Id
  *
  * @param mixed id
  *
  * @return self
  */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
  * Get the value of Datetime
  *
  * @return mixed
  */
  public function getDatetime()
  {
    return $this->datetime;
  }

  /**
  * Set the value of Datetime
  *
  * @param mixed datetime
  *
  * @return self
  */
  public function setDatetime($datetime)
  {
    $this->datetime = $datetime;

    return $this;
  }

  /**
  * Get the value of Patient
  *
  * @return mixed
  */
  public function getPatient()
  {
    return $this->patient;
  }

  /**
  * Set the value of Patient
  *
  * @param mixed patient
  *
  * @return self
  */
  public function setPatient($patient)
  {
    $this->patient = $patient;

    return $this;
  }

}

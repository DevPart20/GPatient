<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation as Serializer;

/**
* @ORM\Entity()
* @Serializer\ExclusionPolicy("all")
*/
class Fournisseur
{
  /**
  * @ORM\Id()
  * @ORM\GeneratedValue()
  * @ORM\Column(type="integer")
  * @Serializer\Expose()
  */
  private $id;

  /** @ORM\Column(type="string") */
  private $CIN;

  /** @ORM\Column(type="string") @Serializer\Expose() */
  private $nom;

  /** @ORM\Column(type="string") @Serializer\Expose()  */
  private $prenom;

  /** @ORM\Column(type="string",nullable=true) @Serializer\Expose()  */
  private $adresse;

  /** @ORM\Column(type="string",nullable=true) @Serializer\Expose()  */
  private $email;

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
  * Get the value of CIN
  *
  * @return mixed
  */
  public function getCIN()
  {
    return $this->CIN;
  }

  /**
  * Set the value of CIN
  *
  * @param mixed CIN
  *
  * @return self
  */
  public function setCIN($CIN)
  {
    $this->CIN = $CIN;

    return $this;
  }

  /**
  * Get the value of Nom
  *
  * @return mixed
  */
  public function getNom()
  {
    return $this->nom;
  }

  /**
  * Set the value of Nom
  *
  * @param mixed nom
  *
  * @return self
  */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
  * Get the value of Prenom
  *
  * @return mixed
  */
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
  * Set the value of Prenom
  *
  * @param mixed prenom
  *
  * @return self
  */
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;

    return $this;
  }

  /**
  * Get the value of Adresse
  *
  * @return mixed
  */
  public function getAdresse()
  {
    return $this->adresse;
  }

  /**
  * Set the value of Adresse
  *
  * @param mixed adresse
  *
  * @return self
  */
  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;

    return $this;
  }

  /**
  * Get the value of Email
  *
  * @return mixed
  */
  public function getEmail()
  {
    return $this->email;
  }

  /**
  * Set the value of Email
  *
  * @param mixed email
  *
  * @return self
  */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

}

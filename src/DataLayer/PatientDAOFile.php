<?php

namespace App\DataLayer;

use App\Contrat\IPatientDAO;
use App\Entity\Patient;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class PatientDAOFile implements IPatientDAO{

  private $fileSystem = null;

  public function __construct() {
    $this->fileSystem = new Filesystem();
  }

  public function ajouter($patient) {
    $encoders = array(new XmlEncoder(), new JsonEncoder());
    $normalizers = array(new ObjectNormalizer());
    $serializer = new Serializer($normalizers, $encoders);
    $jsonContent = $serializer->serialize($patient, 'json');
    $this->fileSystem->appendToFile('d:\\dsymfonyData.json',$jsonContent);
    return true;
  }

  public function modifie($patient) {

  }

  public function supprimer($id) {

  }

  public function findByID($id) {

  }

  public function findAll() {

  }

  public function valider() {

  }


}

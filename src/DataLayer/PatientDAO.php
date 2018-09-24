<?php

namespace App\DataLayer;

use App\Contrat\IPatientDAO;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Patient;

class PatientDAO implements IPatientDAO{

  private $entityManager = null;

  public function  __construct(EntityManagerInterface $em) {
    $this->entityManager = $em;
  }

  public function ajouter($patient) {
    $this->entityManager->persist($patient);
    return true;
  }

  public function modifie($patient) {
    $oldData = $this->entityManager->getReference('App\Entity\Patient',$patient->getId());
    $oldData->setNom($patient->getNom());
    $oldData->setPrenom($patient->getPrenom());
    $oldData->setCIN($patient->getCIN());
    $oldData->setAdresse($patient->getAdresse());
    $oldData->setEmail($patient->getEmail());
    return true;
  }

  public function supprimer($id) {
    $oldData = $this->entityManager->getReference('App\Entity\Patient',$id);
    $this->entityManager->remove($oldData);
    return true;
  }

  public function findByID($id) {
    $patient = $this->entityManager->find('App\Entity\Patient',$id);
    return $patient;
  }

  public function findAll() {
    $query = $this->entityManager->createQuery('SELECT p FROM App\Entity\Patient p');
    return $query->getResult();
  }

  public function valider() {
    $this->entityManager->flush();
  }

  public function getEntityManager() {
    return $this->entityManager;
  }


}

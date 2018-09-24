<?php

namespace App\DataLayer;

use App\Contrat\IFournisseurDAO;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Fournisseur;

class FournisseurDAO implements IFournisseurDAO{

  private $entityManager = null;

  public function  __construct(EntityManagerInterface $em) {
    $this->entityManager = $em;
  }

  public function ajouter($fournisseur) {
    $this->entityManager->persist($fournisseur);
    return true;
  }

  public function modifie($fournisseur) {
    $oldData = $this->entityManager->getReference('App\Entity\Fournisseur',$fournisseur->getId());
    $oldData->setNom($fournisseur->getNom());
    $oldData->setPrenom($fournisseur->getPrenom());
    $oldData->setCIN($fournisseur->getCIN());
    $oldData->setAdresse($fournisseur->getAdresse());
    $oldData->setEmail($fournisseur->getEmail());
    return true;
  }

  public function supprimer($id) {
    $oldData = $this->entityManager->getReference('App\Entity\Patient',$id);
    $this->entityManager->remove($oldData);
    return true;
  }

  public function findByID($id) {
    $fournisseur = $this->entityManager->find('App\Entity\Patient',$id);
    return $fournisseur;
  }

  public function findAll() {
    $query = $this->entityManager->createQuery('SELECT f FROM App\Entity\Fournisseur f');
    return $query->getResult();
  }

  public function valider() {
    $this->entityManager->flush();
  }

  public function getEntityManager() {
    return $this->entityManager;
  }


}

<?php
namespace App\ServiceLayer;

use App\Contrat\IPatientService;
use App\Contrat\IPatientDAO;
use Doctrine\ORM\EntityManagerInterface;

class PatientService implements IPatientService {

  private $dao = null;
  private $entityManager = null;

  public function __construct(IPatientDAO $dao) {
    $this->dao = $dao;
    $this->entityManager =  $dao->getEntityManager();
  }

  public function ajouter($patient) {
    $this->entityManager->getConnection()->beginTransaction();
    try {
      $this->dao->ajouter($patient);
      $this->dao->valider();
      $this->entityManager->getConnection()->commit();
      return true;
    } catch (Exception $e) {
      $this->entityManager->getConnection()->rollBack();
      return $e->getMessage();
    }
    return null;
  }

  public function modifie($patient) {
    $this->entityManager->getConnection()->beginTransaction();
    try {
      $this->dao->modifie($patient);
      $this->dao->valider();
      $this->entityManager->getConnection()->commit();
      return true;
    } catch (Exception $e) {
      $this->entityManager->getConnection()->rollBack();
      return $e->getMessage();
    }
    return null;
  }
  public function supprimer($id) {
    $this->entityManager->getConnection()->beginTransaction();
    try {
      $this->dao->supprimer($id);
      $this->dao->valider();
      $this->entityManager->getConnection()->commit();
      return true;
    } catch (Exception $e) {
      $this->entityManager->getConnection()->rollBack();
      return $e->getMessage();
    }
    return null;
  }
  public function findByID($id) {
    try {
      return $this->dao->findByID($id);
    } catch (Exception $e) {
      return $e->getMessage();
    }
    return null;
  }
  public function findAll() {
    try {
      return $this->dao->findAll();
    } catch (Exception $e) {
      return $e->getMessage();
    }
    return null;
  }

  public function valider() {
    $this->entityManager->flush();
  }


}

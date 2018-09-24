<?php
namespace App\ServiceLayer;

use App\Contrat\IPatientService;
use App\Contrat\IPatientDAO;
use Doctrine\ORM\EntityManagerInterface;

class PatientServiceExcel implements IPatientService {

  private $dao = null;

  public function __construct(IPatientDAO $dao) {
    $this->dao = $dao;

  }

  public function ajouter($patient) {
    try {
      $this->dao->ajouter($patient);
      return true;
    } catch (Exception $e) {
      return $e->getMessage();
    }
    return null;
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

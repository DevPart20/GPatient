<?php
namespace App\ServiceLayer;

use App\Contrat\IPatientService;
use App\Contrat\IPatientDAO;
use Doctrine\ORM\EntityManagerInterface;

class PatientServiceFile implements IPatientService {

  private $dao = null;

  public function __construct(IPatientDAO $dao) {
    $this->dao = $dao;
  }

  public function ajouter($patient) {
    $this->dao->ajouter($patient);
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


}

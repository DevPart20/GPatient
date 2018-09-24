<?php
namespace App\Contrat;


interface IFournisseurService {

  public function ajouter($o);
  public function modifie($o);
  public function supprimer($id);
  public function findByID($id);
  public function findAll();


}

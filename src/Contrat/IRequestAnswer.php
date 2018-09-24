<?php
namespace App\Contrat;


interface IRequestAnswer {

  public function buildUpdateRequestMessage($result);
  public function buildSearchRequestMessage($result);

}
